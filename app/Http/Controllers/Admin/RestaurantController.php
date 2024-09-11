<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
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
        $types=Type::all();
        return view('admin.restaurants.create', compact('types'));
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
        $types=Type::all();
        return view('admin.restaurants.edit', compact('restaurant','types'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $restaurant = auth()->user()->restaurant;
        

        $validated = $request->validate([
            'companyName' => 'required|max:20',
            'address' => 'required|max:30',
            'pIva' => 'required|size:11',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validazione dell'immagine
        ]);

        $restaurant->update($validated);

        return redirect()->route('dashboard')->with('success', 'Ristorante aggiornato con successo.');
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
