<?php

namespace App\Http\Controllers;

use App\Review;
use App\Http\Requests\StoreReviewsRequest;
use App\Http\Requests\UpdateReviewsRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create reviews', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit reviews', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete reviews', ['only' => ['delete', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('frontpage', compact('hotels'));
        return view('reviews.create');
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
        $review = new Review();
        $review->date = now()->format('Y-m-d');
        $review->message = $request->message;
        $review->stars = $request->stars;
        $review->user_id = $request->user()->id;
        $review->hotel_id = $request->hotel_id;

        $review->save();

        $user = Auth::user();
        if ($user->roles->pluck('name')->contains('client')) {
            return redirect()->route('hotels.show', $_GET['id'])->with('status', 'Added Review');
        } else {
            return redirect()->route('reviews.index')->with('status', 'Added Review');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
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
        //
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
        //
        $review->date = $request->date;
        $review->message = $request->message;
        $review->stars = $request->stars;
        $review->hotel_id = $request->hotel_id;

        $review->save();

        return redirect()->route('reviews.index')->with('status', 'Review geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */

    public function delete(Review $review)
    {
        return view('reviews.delete', compact('review'));
    }

    public function destroy(Review $review)
    {
        $review->delete();
        $user = Auth::user();
        if ($user->roles->pluck('name')->contains('client')) {
            return redirect()->route('home')->with('status', 'Review Removed');
        } else {
            return redirect()->route('reviews.index')->with('status', 'Review Deleted');
        }
    }
}
