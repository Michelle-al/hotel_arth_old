<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ReviewResource::collection(
            Review::query()
                ->with('user')
                ->get()
        );
    }
    // query() method allows to pass other methods (ex: relation with another table) before launching the get() request

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
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id'=> 'required|int',
            'rating' => 'required|int|min:1|max:5',
            'title' => 'required|string|max:255',
            'body' => 'required|string|max:500',
            'is_displayed' => ['required', new Boolean],

        ]);

        if ($validator->fails()) {
            return redirect('home/')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validate();

        $review = new Review();
        $review->fill($validatedData)
            ->save();

        return new RoomsResource($review);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $review = ReviewResource::make(Review::query()->firstOrFail($review));
        $review->update($request->post());

        return response()->json($review);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
