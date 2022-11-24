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
        $validator = Validator::make($request->all(), [
            'media_url' => 'required|file',
            'title' => 'required|array',
            'description' => 'required|array'
        ]);
        $validatedData = $validator->validate();

        if ($request->hasFile('media_url')) {
            // Getting the sent file
            $file = $request->file('media_url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

            $validatedData['media_url'] = '/storage/news/' . $file_name;

            // Putting the file in said
            // directory with said filename
            Storage::putFileAs('public/news', $file, $file_name);
        }

        $news = new News();
        $news->media_url = $validatedData['media_url'];
        $news
            ->fill($validatedData)
            ->setTranslations('title', $request->post('title'))
            ->setTranslations('description', $request->post('description'))
            ->save();

        return new NewsResource($news);
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

        /*dd($request->validate([
            'url' => 'nullable|file',
            'title' => 'nullable|json',
            "description" => 'nullable|json'
        ]));*/

        $validatedData = $request->post();

        if ($request->hasFile('media_url')) {
            // Getting the sent file
            $file = $request->file('media_url');
            // Minimal sanitizing of the file name (deleting all whitespace)
            $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

            $validatedData['media_url'] = '/storage/news/' . $file_name;

            // Putting the file in said directory with said filename
            Storage::putFileAs('public/news', $file, $file_name);
            // Modifies the file path in order to find it in the storage/public/hero
            $old_filepath = str_replace('storage/', 'public/', $resource->url);
            Storage::delete( $old_filepath );
        }

        $resource
            ->fill($validatedData)
            ->setTranslations('title', $request->post('title'))
            ->setTranslations('description', $request->post('description'));

        $resource->update();

        return response()->json($resource);
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
