<?php

namespace App\Http\Controllers;

use App\Models\PresentationVideo;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        RoomCategory::all()->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $roomCategory = RoomCategory::query()->find($id);
        // Stores the content of the request body in a variable.
        $dataToUpdate = $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomCategory  $roomCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomCategory $roomCategory)
    {
        //
    }
}
