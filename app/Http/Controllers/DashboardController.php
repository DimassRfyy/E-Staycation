<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function my_bookings()
    {
        $user = Auth::user();

        $mybookings = HotelBooking::with(['room', 'hotel'])->where('user_id', $user->id)->latest()->get();
        return view('dashboard.my_bookings', compact('mybookings'));
    }

    public function booking_details(HotelBooking $hotelBooking)
    {
        return view('dashboard.booking_details', compact('hotelBooking'));
    }
}
  