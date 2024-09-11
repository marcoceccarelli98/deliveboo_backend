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
        // Recupera tutti i piatti dal database
        $dishes = Dish::all(); // Oppure, per la paginazione, puoi usare Dish::paginate(10);

        // Passa i piatti alla vista
        return view('admin.dashboard', compact('dishes'));
    }
}
