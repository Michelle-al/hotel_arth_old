<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomsResource;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use App\Models\Rooms;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // TEST BARRE URL OK
    {
        return RoomsResource::collection(
            Rooms::query()
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
     * @return RoomsResource
     */
    public function store(StoreRoomsRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'room_number' => 'required|int',
            'style' => 'required|string',
            'price' => 'required|int'
        ]);

        $validatedData = $validator->validate();

        $room = new Rooms();
        $room->fill($validatedData)
            ->save();

        return new RoomsResource($room);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $room_number
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show(int $room_number) // TEST BARRE URL OK
    {
        return RoomsResource::make(Rooms::where('room_number', $room_number))->firstOrFail();
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
     * @param  \App\Http\Requests\UpdateRoomsRequest  $request
     * @param  int $room_number
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateRoomsRequest $request, int $room_number)
    {
        $room = RoomsResource::make(Rooms::query()->firstOrFail($room_number));
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
        Rooms::destroy($room_number);
    }
}
