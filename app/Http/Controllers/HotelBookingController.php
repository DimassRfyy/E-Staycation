<?php

namespace App\Http\Controllers;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotel_bookings = HotelBooking::with('hotel', 'customer')->orderByDesc('id')->paginate(10);
        return view('admin.hotel_bookings.index', compact('hotel_bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelBooking $hotelBooking)
    {
        //
        return view('admin.hotel_bookings.show', compact('hotelBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelBooking $hotelBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelBooking $hotelBooking)
    {
        //
        DB::transaction(function () use ($hotelBooking) {
            $hotelBooking->update([
                'is_paid' => true
            ]);
        });
        return redirect()->route('admin.hotel_bookings.show', $hotelBooking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelBooking $hotelBooking)
    {
        //
    }
}
