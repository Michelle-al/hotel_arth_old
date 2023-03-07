<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationsOptionRequest;
use App\Http\Requests\UpdateReservationsOptionRequest;
use App\Http\Resources\ReservationsOptionResource;
use App\Models\ReservationsOption;

class ReservationsOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        /*return ReservationsOptionResource::collection(
            ReservationsOption::query()
                ->with(['reservation','option'])
        );*/
        // TODO - Implements this method if it's usefull
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
     * @param  \App\Http\Requests\StoreReservationsOptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsOptionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservationsOption  $reservationsOption
     * @return \Illuminate\Http\Response
     */
    public function show(ReservationsOption $reservationsOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReservationsOption  $reservationsOption
     * @return \Illuminate\Http\Response
     */
    public function edit(ReservationsOption $reservationsOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservationsOptionRequest  $request
     * @param  \App\Models\ReservationsOption  $reservationsOption
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationsOptionRequest $request, ReservationsOption $reservationsOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReservationsOption  $reservationsOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReservationsOption $reservationsOption)
    {
        //
    }
}
