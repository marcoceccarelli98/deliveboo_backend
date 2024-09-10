<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Auth\UpdateDishRequest;
use App\Http\Requests\Auth\StoreDishRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes= Dish::all();
        return view('admin.dish.index', compact('dishes'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $restaurant= Restaurant::all();
        return view('admin.dish.create', compact('restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();
        // $data['slug'] = Str::of($data['title'])->slug();
        $dish= new Dish();

        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->visibility = $data['visibility'];
        $dish->save();

        return redirect(route('admin.dish.index'))->with('message', 'Piatto modificato correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $dish= Dish::where('slug',$slug)->first();
        return view('admin.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        
        return view('admin.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        $data = $request->validated();
        // $data['slug'] = Str::of($data['title'])->slug();

        $dish->name = $data['name'];
        $dish->description = $data['description'];
        $dish->price = $data['price'];
        $dish->visibility = $data['visibility'];
        $dish->save();

        return redirect(route('admin.dish.index'))->with('message', 'Piatto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('admin.dish.index')->with('message', 'piatto eliminato correttamente');
    }
}
