<?php

namespace App\Http\Controllers;

use App\Http\Resources\PresentationVideoResource;
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
        return PresentationVideoResource::make(PresentationVideo::first());
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
        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $resource= PresentationVideoResource::make(PresentationVideo::findOrFail($id));
        // Stores the content of the request body in a variable.
        $validatedData = $request->post();
        // Display then die : displays information then stop code execution. Equal to console.log. ONLY FOR
        // DEVELOPMENT !!!
        //dd($dataToUpdate);

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('video') && $request->file('video')->isValid()) {
                // Gets sent file
                $file = $request->file('video');
                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
                // Puts the file in the storage directory
                Storage::putFileAs('public/presentation_video', $file, $file_name);

                // Putting the new video path in the validated data media_url
                $validatedData['video_url'] = '/storage/presentation_video' . $file_name;

                // Store the old video's url in a variable
                $old_video_url = $resource->video_url;

                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $old_filepath = str_replace('storage/', 'public/', $old_video_url);

                // Deletes old video's filepath
                Storage::delete($old_filepath);
            }

        $resource
            ->fill($validatedData)
            ->setTranslations('title', $request->post('title'))
            ->setTranslations('description', $request->post('description'));
        // Send updated datas to DB
        $resource->update();

        // Return response content in JSON format
        return response()->json($resource);
    }
}
