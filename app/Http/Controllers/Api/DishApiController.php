<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class DishApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Dish::where('visibility', true);

        if ($request->has('restaurant_id')) {
            $query->where('restaurant_id', $request->input('restaurant_id'));
        }

        $dishes = $query->get();

        return response()->json($dishes);
    }

    public function show($slug)
    {
        $dish = Dish::where('slug', $slug)->where('visibility', true)->firstOrFail();

        return response()->json($dish);
    }
}
