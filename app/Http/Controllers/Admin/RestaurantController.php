<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('admin.restaurants.index', compact('restaurants'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.restaurants.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'companyName' => 'required|max:20',
            'address' => 'required|max:30',
            'pIva' => 'required|size:11',
        ]);

        Restaurant::create($validated);
        return redirect()->route('restaurants.index')->with('success', 'Ristorante creato con successo.');
    }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->firstOrFail();
        return view('admin.restaurants.show', compact('restaurant'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $restaurant = auth()->user()->restaurant;

        return view('admin.restaurants.edit', compact('restaurant'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $validated = $request->validate([
            'companyName' => 'required|max:20',
            'address' => 'required|max 30',
            'pIva' => 'required|size:11',
        ]);

        $restaurant->update($validated);

        return redirect()->route('restaurants.show', $restaurant->slug)->with('success', 'Ristorante aggiornato con successo.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Ristorante eliminato con successo.');
    }
}
