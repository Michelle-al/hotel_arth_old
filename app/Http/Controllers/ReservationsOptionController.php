<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservations_optionRequest;
use App\Http\Requests\UpdateReservations_optionRequest;
use App\Models\Reservations_option;

class ReservationsOptionController extends Controller
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
     * @param  \App\Http\Requests\StoreReservations_optionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservations_optionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservations_option  $reservations_option
     * @return \Illuminate\Http\Response
     */
    public function show(Reservations_option $reservations_option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservations_option  $reservations_option
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservations_option $reservations_option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservations_optionRequest  $request
     * @param  \App\Models\Reservations_option  $reservations_option
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservations_optionRequest $request, Reservations_option $reservations_option)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservations_option  $reservations_option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservations_option $reservations_option)
    {
        //
    }
}
