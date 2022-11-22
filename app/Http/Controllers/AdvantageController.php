<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): string
    {
        return Advantage::all();
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Retrieves information stored in DB for video corresponding to the id passed as a parameter of the request.
        $advantage = Advantage::query()->find($id);

        // Stores the content of the request body in a variable.
        $dataToUpdate = $request->all();
        // Display then die : displays information then stop code execution. Equal to console.log. ONLY FOR
        // DEVELOPMENT !!!
        //dd($dataToUpdate);

        // If the request contains a file, check its validity then store it in the storage folder before sending it
        // to the DB.
        if ($request->hasFile('icon_url')) {
            if ($request->file('icon_url')->isValid()) {

                // Gets sent file
                $file = $request->file('icon_url');

                // Removes whitespaces and get file name
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/advantages', $file, $file_name);

                // Store the old icon's url in a variable
                $old_icon_url = $advantage->icon_url;

                // Store the new icon's url in a variable
                $new_icon_url = 'storage/advantages/' . $file_name;

                // Indicates the column to be modified in DB and what is stored in it
                $dataToUpdate['icon_url'] = $new_icon_url;

                // Modifies the file path in order to allow the server to find the icon in the storage/public/advantages
                $filepath = str_replace('storage/', 'public/', $old_icon_url);

                // Deletes old video's filepath
                Storage::delete($filepath);
            }
        }

        // Send updated datas to DB
        $advantage->update($dataToUpdate);

        // Return response content in JSON format
        return response()->json($advantage);

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
