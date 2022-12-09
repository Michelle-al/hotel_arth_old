<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOptionRequest;
use App\Http\Requests\UpdateOptionRequest;
use App\Http\Resources\OptionResource;
use App\Models\Option;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return OptionResource::collection(
            Option::query()
                ->get()
        );
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
     * @param  \App\Http\Requests\StoreOptionRequest  $request
     * @return OptionResource
     */
    public function store(StoreOptionRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'option_name' => 'required|json',
            'option_price' => 'required|int'
        ]);

        $validatedData = $validator->validate();

        $option = new Option();
        $option->fill($validatedData)
            ->setTranslations('option_name', $request->post('option_name'))
            ->save();

        return new OptionResource($option);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOptionRequest  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOptionRequest $request, int $id)
    {
        $option = OptionResource::make(Option::query()->findOrFail($id));
        $option->update($request->post());

        return response()->json($option);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
