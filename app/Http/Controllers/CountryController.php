<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::orderByDesc('id')->paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('Countryicons', 'public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $newData = Country::create($validated);
        });


        return redirect()->route('admin.countries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Country $country)
{
    DB::transaction(function () use ($request, $country) {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'icon' => ['sometimes','image','mimes:png,jpg,jpeg,webp,svg'],
        ]);

        if ($request->hasFile('icon')) {
            // Hapus file icon lama jika ada
            if ($country->icon) {
                Storage::disk('public')->delete($country->icon);
            }
            
            $iconPath = $request->file('icon')->store('Countryicons', 'public');
            $validated['icon'] = $iconPath;
        }
        
        $validated['slug'] = Str::slug($validated['name']);
        $country->update($validated);
    });

    return redirect()->route('admin.countries.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
{
    DB::transaction(function () use ($country) {
        // Hapus file icon jika ada
        if ($country->icon) {
            Storage::disk('public')->delete($country->icon);
        }
        $country->delete();
    });

    return redirect()->route('admin.countries.index')->with('success', 'Country deleted successfully.');
}

}
