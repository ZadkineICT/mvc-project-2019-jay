<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create reservations',['only' => ['create', 'store']]);
        $this->middleware('permission:edit reservations',['only' => ['edit', 'update']]);
        $this->middleware('permission:delete reservations',['only' => ['delete', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $hotels = DB::table('hotels')->select('id', 'name_hotel')->get();
        return view('reservations.create', compact('hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationsRequest $request)
    {
        $reservation = new Reservation();
        $reservation->start = $request->start;
        $reservation->end = $request->end;
        $reservation->number_of_persons = $request->number_of_persons;
        $reservation->user_id = $request->user()->id;
        $reservation->room_id = $request->room_id;
        $reservation->hotel_id = $request->hotel_id;

        $reservation->save();

        $user = Auth::user();
        if($user->roles->pluck( 'name' )->contains( 'client' ))
        {
            return redirect()->route('home')->with('status', 'Added Reservation');
        }
        else
        {
            return redirect()->route('reservations.index')->with('status', 'Added Reservation');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationsRequest $request, Reservation $reservation)
    {
        //
        $reservation->start = $request->start;
        $reservation->end = $request->end;
        $reservation->number_of_persons = $request->number_of_persons;
        $reservation->user_id = $request->user()->id;
        $reservation->room_id = $request->room_id;
        $reservation->hotel_id = $request->hotel_id;

        $reservation->save();

        return redirect()->route('reservations.index')->with('status', 'Reservation geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */

    public function delete(Reservation $reservation)
    {
        //
        return view('reservations.delete', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        //
        $reservation->delete();
        $user = Auth::user();
        if($user->roles->pluck( 'name' )->contains( 'client' ))
        {
            return redirect()->route('home')->with('status', 'Reservation Canceled');
        }
        else
        {
            return redirect()->route('reservations.index')->with('status', 'Reservation Deleted');
        }
    }
}
