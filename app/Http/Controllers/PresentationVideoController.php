<?php

namespace App\Http\Controllers;

use App\Models\PresentationVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PresentationVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PresentationVideo::all()->first();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     * https://laravel.com/docs/8.x/eloquent#updates
     */

    public function update(Request $request, $id)
    {
// TODO - Vérification des users input

        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $presentation_video = PresentationVideo::query()->find($id);
        // Stores the content of the request body in a variable.
        $dataToUpdate = $request->all();
        // Display then die : displays information then stop code execution. Equal to console.log. ONLY FOR
        // DEVELOPMENT !!!
        //dd($dataToUpdate);

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('video')) {
            if ($request->file('video')->isValid()) {

                // Gets sent file
                $file = $request->file('video');

                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/presentation_video', $file, $file_name);

                // Store the old video's url in a variable
                $old_video_url = $presentation_video->video_url;

                // Store the new video's url in a variable
                $new_video_url = '/storage/presentation_video/' . $file_name;

                // Indicates the column to be modified in DB and what is stored in it
                $dataToUpdate['video_url'] = $new_video_url;

                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $filepath = str_replace('storage/', 'public/', $old_video_url);

                // Deletes old video's filepath
                Storage::delete($filepath);
            }
        };

        // Send updated datas to DB
        $presentation_video->update($dataToUpdate);

        // Return response content in JSON format
        return response()->json($presentation_video);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
