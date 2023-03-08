<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetAvailableRoomsRequest;
use App\Http\Requests\StoreReservationRequest;
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
     * @param GetFreeRoomsRequest $request
     * @mixin Reservation
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getAvailableRooms(GetAvailableRoomsRequest $request) : Collection
    {
        // Data validation
        $validated = $request->validated();
        $checkin = $validated["checkin"];
        $checkout = $validated["checkout"];

        // Get the id of every reservation between two dates
        $reservationsIdArray = Reservation::whereBetween("checkin", [$checkin, $checkout])
                                            ->orWhereBetween("checkout", [$checkin, $checkout])
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  StoreReservationRequest  $request
     */
    public function createReservation(StoreReservationRequest $request)
    {
        $validated = $request->validated();

        dd($validated);

        $reservation = new Reservation;
        $room = explode(',', $validated["room"]);
        $options = explode(',', $validated["options"]);

        $reservation->checkin = $validated["checkin"];
        $reservation->checkout = $validated["checkout"];
        $reservation->save();

        // $reservation->rooms() is a QueryBuilder
        $reservation->rooms()->attach($room);
        $reservation->options()->attach($options);
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
