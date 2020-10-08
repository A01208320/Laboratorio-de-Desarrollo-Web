<?php

namespace App\Http\Controllers;

use App\User;
use App\Title;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth_user_id = auth()->user()->id;
        if (request('query')) {
            $reviews = $this->search()->paginate(5);
        } else {
            $reviews = Review::getReviews($auth_user_id)->paginate(5);
        }

        return view('reviews.index', compact('reviews'));
    }

    public function search()
    {
        $value = request('query');
        $auth_user_id = auth()->user()->id;
        if ($value == 'Recomendado' || $value == 'recomendado') {
            $value = 1;
        } else if ($value == 'No recomendado' || $value == 'no recomendado') {
            $value = 0;
        }
        $reviews = Review::getFilteredReviews($auth_user_id, $value);
        return $reviews;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = Title::all();
        return view('reviews.create', compact('titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateReview();
        $review = Review::firstOrCreate(([
            'title_id' => $request->title_id,
            'user_id' => auth()->user()->id,
            'recommendation' => $request->recommendation,
            'comment' => $request->comment,
        ]));
        return view('reviews.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //$this->validateReview();
        $review->update([
            'recommendation' => $request->recommendation,
            'comment' => $request->comment,
        ]);
        return view('reviews.success');
    }

    public function confirm(Review $review)
    {
        return view('reviews.confirm', compact('review'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        Review::destroy($review->id);
        return view('reviews.success');
    }

    public function validateReview()
    {
        $user_id = auth()->user()->id;
        $rules = [
            'title_id' => 'unique:title_user,title_id,NULL,id,user_id,' . $user_id,
            'recommendation' => ['required'],
            'comment' => ['required'],
        ];
        $custom_messages = [
            'comment.required' => 'Proporciona un comentario.',
        ];
        return request()->validate($rules, $custom_messages);
    }
}
