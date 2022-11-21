<?php

namespace App\Http\Controllers;

use App\Models\PresentationVideo;
use App\Models\RoomCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RoomCategory::all();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $roomCategory = RoomCategory::query()->find($id);
        // Stores the content of the request body in a variable.
        $dataToUpdate = $request->all();

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('url')) {
            if ($request->file('url')->isValid()) {

                // Gets sent file
                $file = $request->file('url');

                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/room_categories', $file, $file_name);

                // Store the old video's url in a variable
                $oldVideoUrl = $roomCategory->url;

                // Store the new video's url in a variable
                $newRoomUrl = '/storage/room_categories/' . $file_name;

                // Indicates the column to be modified in DB and what is stored in it
                $dataToUpdate['url'] = $newRoomUrl;

                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $filepath = str_replace('storage/', 'public/', $oldVideoUrl);

                // Deletes old video's filepath
                Storage::delete($filepath);
            }
        };

        // Send updated datas to DB
        $roomCategory->update($dataToUpdate);

        // Return response content in JSON format
        return response()->json($roomCategory);
    }

}
