<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Hero::all()->first();
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
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function show(Hero $hero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $hero = Hero::all()->first();

        if ($request->hasFile('media_url')) {
             // Getting the sent file
            $file = $request->file('media_url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
            // Putting the file in said directory with said filename
            Storage::putFileAs('public/hero', $file, $file_name);
            // Swapping file to path
            $request->media_url = '/storage/hero/' . $file_name;
            // Modifies the file path in order to find it in the storage/public/hero
            $filepath = str_replace('storage/', 'public/', $hero->media_url);
            Storage::delete( $filepath );
        }

        // Updating database data : array_filter discard all empty fields beforehand.
        $hero->update(
            array_filter(
                [
            'title' => $request->title,
            'title_english' => $request->title_english,
            'media_url' => $request->media_url,
            'subtitle' => $request-> subtitle,
            'subtitle_english' => $request->subtitle_english
                ]
            )
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        //
    }
}
