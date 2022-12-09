<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Nette\Schema\ValidationException;

class UserController extends Controller
{
    /**
     * Register a user.
     ** @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validatedData->fails())
        {
            return response()->json([
                'message' => $validatedData->errors(),
            ]);
        }

        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);


    }

    /**
     * Display a user.
     ** @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function login(Request $request)
    {

//    dd(Auth::attempt(['email' => $request['email'], 'password' => $request['password']]));
//        try
//        {
//            $user = User::where('email', $request['email'])->firstOrFail();
//
//        }
//        catch(ValidationException $e){
//            return 'Email et/ ou mot de passe incorrect';
//        }
//
//        $token = $user->createToken('auth_token')->plainTextToken;
//        return response()->json([
//            'access_token' => $token,
//            'token_type' => 'Bearer',
//        ]);

        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validatedData->fails())
        {
            return response()->json([
                'message' => $validatedData->errors(),
            ]);
        }
        if (!Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            try
            {
                $user = User::where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            }
            catch(ModelNotFoundException $e){
//                dd($e->getMessage());
                $e->getMessage();
            }
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        $user = User::where('email', $request['email'])->firstOrFail();

        return response()->json($user);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

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
        $user = User::query()->find($id);
        $dataToUpdate = $request->all();

        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {

                // Gets sent file
                $file = $request->file('avatar');

                // Removes whitespaces
                $file_name = preg_replace('/\s+/', '', $file->getClientOriginalName());

                // Puts the file in the storage directory
                Storage::putFileAs('public/avatars', $file, $file_name);

                // Stocker l'url de l'ancienne video dans une variable
                $old_avatar_url = $user->avatar_url;

                // Stocker le chemin vers la nouvelle video dans une variable
                $new_avatar_url = 'storage/avatars/' . $file_name;

                // indiquer la colonne à modifier en BD et ce qu'on y stocke
                $dataToUpdate['avatar'] = $new_avatar_url;

                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $filepath = str_replace('storage/', 'public/', $old_avatar_url);

                // Supprimer le lien vers l'ancienne vidéo
                Storage::delete($filepath);
            }
        };

        // Envoyer les données mises à jour vers la DB
        $user->update($dataToUpdate);

        // Retourner le résultat de la réponse au format JSON
        return response()->json($user);
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
