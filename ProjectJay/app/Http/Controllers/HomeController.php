<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');

    }
    // if it doesn't work, make another page with reservation.index
    public function indexReservations()
    {
        $userId = Auth::user()->id;
        $reservations = Reservation::where('user_id',$userId)->get();

        return view('reservationuserShow', compact('reservations'));
    }

    public function delete(Reservation $reservation)
    {
        return view('reservationuserDelete', compact('reservation'));
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

    public function showChangePasswordForm()
    {
        return view('changepassword');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
