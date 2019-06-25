<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Review;
use App\Favorite;
use App\Hotel;
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
        $reservations = Reservation::where('user_id', $userId)->get();

        return view('reservationUserShow', compact('reservations'));
    }

    public function indexReviews()
    {
        $userId = Auth::user()->id;
        $reviews = Review::where('user_id', $userId)->get();

        return view('reviewUserShow', compact('reviews'));
    }

    public function indexFavorites()
    {
        $userId = Auth::user()->id;
        $hotels = Hotel::all();
        $favorites = Favorite::where('user_id', $userId)->get();
        return view('favoriteUserShow', compact('favorites', 'hotels'));
    }
    public function deleteReviews(Review $review)
    {
        // $hotel = Hotel::where('id', $review->hotel_id)->get();
        return view('reviewuserDelete', compact('review'));
    }

    public function destroyReviews(Review $review)
    {
        //
        $user = Auth::user();
        if ($user->roles->pluck('name')->contains('client')) {
            $review->delete();
            return redirect()->route('home')->with('status', 'Review removed');
        } else {
            return redirect()->route('reservations.index')->with('status', 'Review not removed');
        }
    }


    public function deleteReservations(Reservation $reservation)
    {
        return view('reservationUserDelete', compact('reservation'));
    }

    public function destroyReservations(Reservation $reservation)
    {
        //
        $user = Auth::user();
        if ($user->roles->pluck('name')->contains('client')) {
            $reservation->delete();
            return redirect()->route('home')->with('status', 'Reservation Canceled');
        } else {
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
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->route('home')->with("message", "Password changed successfully !");
    }
}
