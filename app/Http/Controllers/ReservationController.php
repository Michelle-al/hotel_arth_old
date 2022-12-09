<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\Room;
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
    public function isAvailable(Request $request) : JsonResponse
    {
        $validator = Validator::make($request->post(), [
                'checkin' => 'required|date|date_format:Y-m-d',
                'checkout' => 'required|date|after:checkin',
                'number_of_people' => 'required|integer|min:1'
            ]
        );

        $validated = $validator->validate();

//        $reservations = ReservationResource::collection(Reservation::all()
//            ->where('checkin', $validated['checkin']));

//        $roomStyle = Room::where('style', 'La classique')->get();
//        $reservations = $roomStyle;

        // To retrieve rooms  (works)
        $reservations = DB::table('reservations')
            ->join('reservations_rooms', function ($join) {
                $join->on('reservations.id', '=', 'reservations_rooms.reservation_id');
            })
            ->join('rooms', function ($join) {
                $join->on('reservations_rooms.room_number', '=', 'rooms.room_number');
            })
            ->get();

//        dd(response()->json($reservations));
//        $reservations = ReservationResource::make(Reservation::all());

        return response()->json($reservations);



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
