<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Customer::all();
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCustomerRequest $request, $id)
    {
        $customer = Customer::query()->find($id);
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
                $old_avatar_url = $customer->avatar_url;
                // Stocker le chemin vers la nouvelle video dans une variable
                $new_avatar_url = '/storage/avatars/' . $file_name;
                // indiquer la colonne à modifier en BD et ce qu'on y stocke
                $dataToUpdate['avatar'] = $new_avatar_url;
                // Modifies the file path in order to allow the server to find the video in the storage/public/hero
                $filepath = str_replace('storage/', 'public/', $old_avatar_url);
                // Supprimer le lien vers l'ancienne vidéo
                Storage::delete($filepath);
            }
        };

        // Envoyer les données mises à jour vers la DB
        $customer->update($dataToUpdate);

        // Retourner le résultat de la réponse au format JSON
        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
