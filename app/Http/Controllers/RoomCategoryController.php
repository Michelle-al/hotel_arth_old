<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoomCategoryResource;
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
        return RoomCategoryResource::collection(RoomCategory::all());
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
        $resource = RoomCategoryResource::make(RoomCategory::findOrFail($id));
        // Stores the content of the request body in a variable.
        $validatedData = $request->post();

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('media_url') && $request->file('url')->isValid()) {
                // Gets sent file
                $file = $request->file('media_url');

                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/room_categories', $file, $file_name);

                // Indicates the column to be modified in DB and what is stored in it
                $validatedData['media_url'] = '/storage/room_categories/' . $file_name;

                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $old_filepath = str_replace('storage/', 'public/', $resource->media_url);

                // Deletes old video's filepath
                Storage::delete($old_filepath);
        };

        // Send updated datas to DB
        $resource
        ->fill($validatedData)
        ->setTranslations('title', $request->post('title'))
        ->setTranslations('description', $request->post('description'));

        $resource->update();

        // Return response content in JSON format
        return response()->json($resource);
    }

}
