<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Http\Requests\StoreHotelsRequest;
use App\Http\Requests\UpdateHotelsRequest;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:create hotels', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit hotels', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete hotels', ['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view('hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHotelsRequest $request)
    {
        //
        $hotel = new Hotel();
        $hotel->name_hotel = $request->name_hotel;
        $hotel->address = $request->address;
        $hotel->zip_code = $request->zip_code;
        $hotel->city = $request->city;
        $hotel->country = $request->country;
        $hotel->phone_number = $request->phone_number;

        $hotel->save();

        return redirect()->route('hotels.index')->with('status', 'Added hotel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
        $reviews = Review::all();
        return view('hotels.show', compact('hotel'), compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
        return view('hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelsRequest $request, Hotel $hotel)
    {
        //
        $hotel->name_hotel = $request->name_hotel;
        $hotel->address = $request->address;
        $hotel->zip_code = $request->zip_code;
        $hotel->city = $request->city;
        $hotel->country = $request->country;
        $hotel->phone_number = $request->phone_number;

        $hotel->save();

        return redirect()->route('hotels.index')->with('status', 'Hotel geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function delete(Hotel $hotel)
    {
        //
        return view('hotels.delete', compact('hotel'));
    }

    public function destroy(Hotel $hotel)
    {
        //
        $hotel->delete();
        return redirect()->route('hotels.index')->with('status', 'Hotel deleted');
    }
}
