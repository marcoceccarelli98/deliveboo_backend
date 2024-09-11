<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Auth\UpdateDishRequest;
use App\Http\Requests\Auth\StoreDishRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();
        // $data['slug'] = Str::of($data['title'])->slug();
        $dish = new Dish();

        $dish->restaurant_id = auth()->user()->restaurant->id;
        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->visibility = $data['visibility'];
        $dish->slug = Str::slug($request->name, '-');

        // Se un'immagine è stata caricata
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('dishes', 'public');
            $dish->path_img = $imagePath; // Salviamo il percorso dell'immagine
        }

        $dish->save();

        return redirect(route('dashboard'))->with('message', 'Piatto modificato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $dish = Dish::where('slug', $slug)->first();
        return view('admin.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        // Il parametro $dish viene automaticamente risolto da Eloquent usando il campo 'slug'
        return view('admin.dishes.edit', compact('dish'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $data = $request->validated();

        // Gestione dell'immagine
        if ($request->hasFile('image')) {
            // Elimina la vecchia immagine se esiste
            if ($dish->path_img) {
                Storage::disk('public')->delete($dish->path_img);
            }

            // Salva la nuova immagine
            $imagePath = $request->file('image')->store('dishes', 'public');
            $dish->path_img = $imagePath; // Salviamo il percorso dell'immagine
        }

        // Aggiornamento dello slug se il nome è cambiato
        if ($dish->name !== $data['name']) {
            $data['slug'] = Str::slug($data['name']);
        }

        // Aggiornamento del piatto
        $dish->update($data);

        return redirect(route('dashboard'))->with('message', 'Piatto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {

        // Cancella l'immagine associata al piatto se esiste
        if ($dish->path_img) {
            $filePath = str_replace('storage/', '', $dish->path_img);
            Storage::disk('public')->delete($filePath);
        }

        $dish->delete();

        return redirect()->route('dashboard')->with('message', 'piatto eliminato correttamente');
    }
}
