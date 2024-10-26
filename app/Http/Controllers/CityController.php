<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCityRequest;
use Illuminate\Support\Facades\Storage;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::orderByDesc('id')->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::orderByDesc('id')->get();
        return view('admin.cities.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('Cityicons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($validated['name']);
            $newData = City::create($validated);
        });

        return redirect()->route('admin.cities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $countries = Country::orderByDesc('id')->get();
        return view('admin.cities.edit',compact('city','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        DB::transaction(function () use ($request,$city) {
            $validated = $request->validate([
                'name' => ['required','string','max:255',],
                'icon' => ['sometimes','image','mimes:png,jpg,jpeg,webp,svg'],
                'country_id' => ['required','integer'],
            ]);

            if ($request->hasFile('icon')) {
                // Hapus file icon lama jika ada
                if ($city->icon) {
                    Storage::disk('public')->delete($city->icon);
                }
                
                $iconPath = $request->file('icon')->store('Cityicons', 'public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $city->update($validated);
        });

        return redirect()->route('admin.cities.index' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        DB::transaction(function () use ($city) {
            // Hapus file icon jika ada
            if ($city->icon) {
                Storage::disk('public')->delete($city->icon);
            }
            $city->delete();
        });
        return redirect()->route('admin.cities.index');
    }
}
