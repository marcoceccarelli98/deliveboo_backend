<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;


class DashboardController extends Controller
//passaggio rotta al controller
{
    public function index()
    {
        // Recupera il ristorante associato all'utente autenticato
        $restaurant = auth()->user()->restaurant;

        // Recupera solo i piatti associati al ristorante dell'utente
        $dishes = Dish::where('restaurant_id', $restaurant->id)->get();

        // Passa i piatti alla vista
        return view('admin.dashboard', compact('restaurant', 'dishes'));
    }
}
