<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

    public function index()
    {
        return NewsResource::collection(News::all());
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
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return NewsResource::make(
            News::query()
                ->where([
                    'id' => 1
                ])
                ->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $resource = NewsResource::make(News::findOrFail($id));

        /*        $validator = Validator::make($request->all(), [
            'url' => 'nullable|file',
            'title' => 'nullable|json',
            "description" => 'nullable|json'
        ]);

        /*dd($request->validate([
            'url' => 'nullable|file',
            'title' => 'nullable|json',
            "description" => 'nullable|json'
        ]));*/

        if ($request->hasFile('url')) {
            // Getting the sent file
            $file = $request->file('url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
            // Putting the file in said directory with said filename
            Storage::putFileAs('public/news', $file, $file_name);
            // Swapping file to path
            $request->url = '/storage/news/' . $file_name;
            // Modifies the file path in order to find it in the storage/public/hero
            $filepath = str_replace('storage/', 'public/', $resource->url);
            Storage::delete( $filepath );
        }

        // Updating database data : array_filter discard all empty fields beforehand.
        $request->title = json_decode($request->title, true);
        $request->description = json_decode($request->description, true);
        dd($request->all(), $request->url);
        $resource->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
