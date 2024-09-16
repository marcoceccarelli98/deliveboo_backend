<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth\StoreRestaurantRequest;
use App\Http\Requests\Auth\UpdateRestaurantRequest;


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
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();

        Restaurant::create($data);
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
    public function edit(Restaurant $restaurant)
    {
        // Assicurati che l'utente possa modificare solo il proprio ristorante
        if ($restaurant->id !== auth()->user()->restaurant->id) {
            abort(403, 'Non sei autorizzato a modificare questo ristorante.');
        }

        $types = Type::all();
        return view('admin.restaurants.edit', compact('restaurant', 'types'));
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        // Assicurati che l'utente possa aggiornare solo il proprio ristorante
        if ($restaurant->id !== auth()->user()->restaurant->id) {
            abort(403, 'Non sei autorizzato a modificare questo ristorante.');
        }

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($restaurant->path_img) {
                Storage::disk('public')->delete($restaurant->path_img);
            }
            $data['path_img'] = $request->file('image')->store('restaurants', 'public');
        }

        if ($restaurant->companyName !== $data['companyName']) {
            $data['slug'] = Str::slug($data['companyName']);
        }

        $restaurant->update($data);

        if (isset($data['types'])) {
            $restaurant->types()->sync($data['types']);
        }

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
