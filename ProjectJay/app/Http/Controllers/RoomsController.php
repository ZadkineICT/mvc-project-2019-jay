<?php

namespace App\Http\Controllers;

use App\Room;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomsRequest $request)
    {
        //
        $room = new Room();
        $room->room_size = $request->room_size;
        $room->hotel_id = $request->hotel_id;

        $room->save();

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
        return view('rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomsRequest $request, Room $room)
    {
        //
        $room->room_size = $request->room_size;
        $room->hotel_id = $request->hotel_id;

        $room->save();

        return redirect()->route('rooms.index')->with('status', 'Room geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */

    public function delete(Room $room)
    {
        //
        return view('rooms.delete', compact('room'));
    }

    public function destroy(Room $room)
    {
        //
        $room->delete();
        return redirect()->route('rooms.index')->with('message', 'Room deleted');
    }
}
