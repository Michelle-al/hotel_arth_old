<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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
        }else{
            $user = User::create([
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            // Delete old tokens in db
            $user->tokens()->delete();

            //Get remember token
            $rememberToken = $user->remember_token;

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
                'remember_token' => $rememberToken
            ]);
        }
    }

    /**
     * Display a user.
     ** @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function login(Request $request)
    {
        // Validation
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // if validation fails
        if ($validatedData->fails())
        {
            return response()->json([
                'message' => $validatedData->errors()
            ]);
        }

        // Check if right email and password match in database (authentication)
        $authentication = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]) === true;

        // Trow an exception if authentication fails
        function checkauthentication($response) {
            if(!$response) {
                throw new Exception("Email et/ ou mot de passe incorrecte");
            }
            return true;
        }
        try {
            // Authentication of user pass
            checkauthentication($authentication);
            // Get user information
            $user = User::where('email', $request['email'])->firstOrFail();

            // Delete old tokens in db
            $user->tokens()->delete();

            //Get remember token
            $rememberToken = $user->remember_token;

            // Create a new token
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'token' => $token,
                'remember_token' => $rememberToken,
                'user' => $user,
            ]);
//            return redirect()->route('welcome');
        }
        catch (Exception $e){
            // Authentication of user fails
            return response()->json([
                'message' => [
                    'error' => $e->getMessage()
                ]
            ]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user($id)
    {
        $user = User::query()->find($id);
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
