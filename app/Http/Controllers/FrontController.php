<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelBookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSearchHotelRequest;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\HotelRoom;


class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function hotels()
    {
        return view('front.hotels');
    }

    public function search_hotels(StoreSearchHotelRequest $request)
    {
        $request->session()->put('checkin_at', $request->input('checkin_at'));
        $request->session()->put('checkout_at', $request->input('checkout_at'));
        $request->session()->put('keyword', $request->input('keyword'));

        $keyword = $request->session()->get('keyword');

        return redirect()->route('front.hotels.list', ['keyword' => $keyword]);
    }

    public function list_hotels($keyword)
    {
        $hotels = Hotel::with(['rooms', 'city', 'country'])

            ->whereHas('country', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })

            ->orwhereHas('city', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })

            ->orWhere('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('front.list_hotels', compact('hotels', 'keyword'));
    }

    public function hotel_details(Hotel $hotel)
    {
        $latesPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();

        return view('front.details', compact('hotel', 'latesPhotos'));
    }
    public function hotel_rooms(Hotel $hotel)
    {
        // $latesPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();

        return view('front.list_hotel_rooms', compact('hotel'));
    }

    public function hotel_room_book(StoreHotelBookingRequest $request, Hotel $hotel, HotelRoom $hotel_room,)
    {
        $user = Auth::user();

        $checkin_at = $request->session()->get('checkin_at');
        $checkout_at = $request->session()->get('checkout_at');

        $hotelBookingId = null;

        //Closure  based database transaction

        DB::transaction(function () use (
            $request,
            $user,
            $hotel,
            $hotel_room,
            $checkin_at,
            $checkout_at,
            &$hotelBookingId
        ) {
            $validate = $request->validated();

            $validate['user_id'] = $user->id;
            $validate['hotel_id'] = $hotel->id;
            $validate['checkin_at'] = $checkin_at;
            $validate['checkout_at'] = $checkout_at;
            $validate['hotel_room_id'] = $hotel_room->id;
            $validate['is_paid'] = false;
            $validate['proof'] = 'dummytrx.png';

            // Menghitung total hari
            $checkinDate = \Carbon\Carbon::parse($checkin_at);
            $checkoutDate = \Carbon\Carbon::parse($checkout_at);
            $totalDays = $checkinDate->diffInDays($checkoutDate);

            $validate['total_days'] = $totalDays;
            $validate['total_amounts'] = $hotel_room->price * $totalDays;

            // Debug untuk memeriksa data yang disimpan

            //


            $newBooking = HotelBooking::create($validate);

            $hotelBookingId = $newBooking->id;
        });


        return redirect()->route('front.hotel.book.payment', $hotelBookingId);
    }

    public function hotel_payment(HotelBooking $hotel_booking)
    {
        $user = Auth::user();
        return view('front.book_payment', compact('hotel_booking', 'user'));
    }

    public function hotel_payment_store(StoreHotelBookingRequest $request, HotelBooking $hotel_booking)
    {
        $user = Auth::user();

        if ($hotel_booking->user_id !== $user->id) {
            abort(403);
        }
        DB::transaction(function () use ($request, $hotel_booking) {
            // Hasil validasi disimpan di variabel terpisah, tidak menimpa $request
            $validatedData = $request->validated();

            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validatedData['proof'] = $proofPath;
            }

            // Update booking dengan data yang telah tervalidasi
            $hotel_booking->update($validatedData);
        });
        return redirect()->route('front.book_finish');
    }

    public function hotel_book_finish(){
        return view('front.book_finish');
    }
}
