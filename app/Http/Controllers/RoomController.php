<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomResource;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index() // TEST BARRE URL OK
    {
        return RoomResource::collection(
            Room::query()
                ->get()
        );
    }
    // query() method allows to pass other methods (ex: relation with another table) before launching the get() request

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
     * @param  \App\Http\Requests\StoreRoomsRequest  $request
     * @return RoomResource
     */
    public function store(StoreRoomsRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|int',
            'style' => 'required|string',
            'price' => 'required|int'
        ]);

        $validatedData = $validator->validate();

        $room = new Room();
        $room->fill($validatedData)
            ->save();

        return new RoomResource($room);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $room_number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(int $room_number) // TEST BARRE URL OK
    {
        return RoomResource::make(Room::where('room_number', $room_number))->firstOrFail();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $room_number
     * @return \Illuminate\Http\Response
     */
    public function edit(int $room_number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  int $room_number
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRoomRequest $request, int $room_number)
    {
        $room = RoomResource::make(Room::query()->firstOrFail($room_number));
        $room->update($request->post());

        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $room_number
     * @return \Illuminate\Http\Response
     */
    public function destroy($room_number)
    {
        Room::destroy($room_number);
    }
}
