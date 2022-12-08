<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomsResource;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use App\Models\Rooms;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomsRequest $request)
    {
        // TODO - Implementer la fonction
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rooms  $room_number
     * @return \Illuminate\Http\Response
     */
    public function show(Rooms $room_number)
    {
        //// TODO - Implementer la fonction
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rooms  $room_number
     * @return \Illuminate\Http\Response
     */
    public function edit(Rooms $room_number)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomsRequest  $request
     * @param  \App\Models\Rooms  $room_number
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomsRequest $request, Rooms $room_number)
    {
        // TODO - Implementer la fonction : L'admin doit au moins pouvoir changer le prix des chambres.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rooms $room_number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rooms $room_number)
    {
        //// TODO - Implementer la fonction
    }
}
