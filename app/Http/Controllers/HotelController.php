<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::with('rooms')->orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::orderByDesc('id')->get();
        $cities = City::orderByDesc('id')->get();
        return view('admin.hotels.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('hotelThumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }


            $validated['slug'] = Str::slug($validated['name']);

            // Debugging: Pastikan thumbnail ada di array
            // dd($validated);

            // Menyimpan data hotel ke database
            $hotel = Hotel::create($validated);


            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('photos', 'public');
                    $hotel->photos()->create([
                        'photo' => $photoPath
                    ]);
                }
            }
        });

        return redirect()->route('admin.hotels.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        $latesPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();
        return view('admin.hotels.show', compact('hotel', 'latesPhotos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        $countries = Country::orderByDesc('id')->get();
        $cities = City::orderByDesc('id')->get();
        $latesPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();
        return view('admin.hotels.edit', compact('hotel', 'countries', 'cities', 'latesPhotos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, Hotel $hotel)
{
    DB::transaction(function () use ($request, $hotel) {
        $validated = $request->validated();

        // Hapus thumbnail lama jika ada file baru yang diunggah
        if ($request->hasFile('thumbnail')) {
            if ($hotel->thumbnail) {
                Storage::disk('public')->delete($hotel->thumbnail);
            }
            $thumbnailPath = $request->file('thumbnail')->store('hotelThumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $validated['slug'] = Str::slug($validated['name']);

        $hotel->update($validated);

        if ($request->hasFile('photos')) {
            // Menghapus foto lama
            foreach ($hotel->photos as $photo) {
                Storage::disk('public')->delete($photo->photo);
                $photo->delete();
            }

            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('photos', 'public');
                $hotel->photos()->create([
                    'photo' => $photoPath
                ]);
            }
        }
    });

    return redirect()->route('admin.hotels.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
{
    DB::transaction(function () use ($hotel) {
        // Hapus file thumbnail jika ada
        if ($hotel->thumbnail) {
            Storage::disk('public')->delete($hotel->thumbnail);
        }

        // Hapus semua file foto terkait dengan hotel ini
        foreach ($hotel->photos as $photo) {
            Storage::disk('public')->delete($photo->photo);
            $photo->delete(); // Hapus record dari database
        }

        $hotel->delete();
    });

    return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
}

}
