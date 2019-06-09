<?php

namespace App\Http\Controllers;

use App\Roomtype;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomtypesRequest;
use App\Http\Requests\UpdateRoomtypesRequest;

class RoomtypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create roomtypes',['only' => ['create', 'store']]);
        $this->middleware('permission:edit roomtypes',['only' => ['edit', 'update']]);
        $this->middleware('permission:delete roomtypes',['only' => ['delete', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomtypes = Roomtype::all();

        return view('roomtypes.index', compact('roomtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roomtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomtypesRequest $request)
    {
        //
        $roomtype = new Roomtype();
        $roomtype->name = $request->name;
        $roomtype->price = $request->price;

        $roomtype->save();

        return redirect()->route('roomtypes.index')->with('status', 'Added Roomtype');
    }

    /**
     * Display the specified resource
     *
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function show(Roomtype $roomtype)
    {
        //
        return view('roomtypes.show', compact('roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Roomtype $roomtype)
    {
        //
        return view('roomtypes.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomtypesRequest $request, Roomtype $roomtype)
    {
        //
        $roomtype->name = $request->name;
        $roomtype->price = $request->price;

        $roomtype->save();

        return redirect()->route('roomtype.index')->with('status', 'Roomtype updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Roomtype  $roomtype
     * @return \Illuminate\Http\Response
     */

    public function delete(Roomtype $roomtype)
    {
        //
        return view('roomtypes.delete', compact('roomtype'));
    }

    public function destroy(Roomtype $roomtype)
    {
        //
        $roomtype->delete();
        return redirect()->route('roomtypes.index')->with('status', 'Roomtype deleted');
    }
}
