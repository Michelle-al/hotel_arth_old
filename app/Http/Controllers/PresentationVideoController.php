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

        // récupérer les informations en DB
        $presentation_video = PresentationVideo::query()->find($id);
        // Stocker le contenu de la requête dans une variable
        $dataToUpdate = $request->all();
//        dd($dataToUpdate);

        // Si la requête contient un fichier, vérifier sa validité
        if ($request->hasFile('video')) {
            if ($request->file('video')->isValid()) {
                // Gets sent file
                $file = $request->file('video');
                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());
                // Puts the file in the storage directory
                Storage::putFileAs('public/presentation_video', $file, $file_name);
                // Stocker l'url de l'ancienne video dans une variable
                $old_video_url = $presentation_video->video_url;
                // Stocker le chemin vers la nouvelle video dans une variable
                $new_video_url = '/storage/presentation_video/' . $file_name;
                // indiquer la colonne à modifier en BD et ce qu'on y stocke
                $dataToUpdate['video_url'] = $new_video_url;
                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $filepath = str_replace('storage/', 'public/', $old_video_url);
                // Supprimer le lien vers l'ancienne vidéo
                Storage::delete($filepath);
            }
        };

        // Envoyer les données mises à jour vers la DB
        $presentation_video->update($dataToUpdate);

        // Retourner le résultat de la réponse au format JSON
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
