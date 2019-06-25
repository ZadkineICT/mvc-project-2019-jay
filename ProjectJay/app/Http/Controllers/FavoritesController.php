<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Http\Requests\UpdateFavoritesRequest;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create favorites', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit favorites', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete favorites', ['only' => ['delete', 'destroy']]);
    }

    public function index()
    {
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($hotelID)
    {
        $favorite = new Favorite();
        $favorite->hotel_id = $hotelID;
        $favorite->user_id = Auth::user()->id;

        $favorite->save();
        return redirect()->route('favoriteUserShow')->with('status', 'Added Favorite');
    }

    public function destroy($hotelID)
    {
        Favorite::where('hotel_id', $hotelID)->where('user_id', Auth::user()->id)->delete();
        return redirect()->route('favoriteUserShow')->with('status', 'Favorite deleted');
    }
}
