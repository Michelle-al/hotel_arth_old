<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @return \App\Http\Resources\ReservationResource
     */
    public function show(int $id)
    {
        return ReservationResource::make(Reservation::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->post(), [
            'status' => 'string|in:validated,cancelled,no-show,terminated'
                ]
        );

        $validated = $validator->validated();

        $resource = ReservationResource::make(Reservation::findOrFail($id));

        $resource->update($validated);

        return response()->json($resource);
    }

    /**
     * @param Request $request
     * @mixin Reservation
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function isAvailable(Request $request) : Collection
    {
//        $validator = Validator::make($request->post(), [
//                'checkin' => 'required|date|date_format:Y-m-d',
//                'checkout' => 'required|date|after:checkin',
//                'number_of_people' => 'required|integer|min:1'
//            ]
//        );

        // Get the reservations between two dates
        $reservationsIdArray = Reservation::whereBetween("checkin", [$request->checkin, $request->checkout])
                                            ->orWhereBetween("checkout", [$request->checkin, $request->checkout])
                                            ->pluck("id");

        // Retrieve Reservations in a Collection
        $reservations = Reservation::whereIn("id", $reservationsIdArray)->get();

        // Iterate over the collection of Reservation models to retrieve the rooms booked
        $booked = [];
        forEach ($reservations as $reservation) {
            $booked = [ ...$reservation->rooms->pluck("id") ];
        };

        // Return the free rooms
        return Room::all()->whereNotIn("id", array_unique($booked));
    }

    public function createReservation(Request $request)
    {
        $reservation = new Reservation;
        $room = explode(',', $request->room);
        $reservation->checkin = $request->checkin;
        $reservation->save();
        // $reservation->rooms is a BelongsToMany
        // But $reservation->rooms() is a QueryBuilder
        $reservation->rooms()->attach($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
