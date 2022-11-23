<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvantageResource;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : AnonymousResourceCollection
    {
        return AdvantageResource::collection(Advantage::all());
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $resource = AdvantageResource::make(Advantage::findOrFail($id));

        // Stores the content of the request body in a variable.
        $validatedData = $request->post();
        // Display then die : displays information then stop code execution. Equal to console.log. ONLY FOR
        // DEVELOPMENT !!!
        //dd($dataToUpdate);

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('icon_url') && $request->file('icon_url')->isValid()) {
                // Gets sent file
                $file = $request->file('icon_url');

                // Removes whitespaces and get file name
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/advantages', $file, $file_name);

                // Store the new icon's url in a variable
                $validatedData['icon_url'] = 'storage/advantages/' . $file_name;

                // Modifies the file path in order to allow the server to find the icon in the storage/public/advantages
                $old_filepath = str_replace('storage/', 'public/', $old_icon_url);

                // Deletes old video's filepath
                Storage::delete($old_filepath);
        }

        // Send updated datas to DB
        $resource
            ->fill($validatedData)
            ->setTranslations('title', $request->post('title'))
            ->setTranslations('description', $request->post('subtitle'));

        $resource->update();

        // Return response content in JSON format
        return response()->json($resource);

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
