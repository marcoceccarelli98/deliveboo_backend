<?php

// app/Http/Controllers/Api/RestaurantApiController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Resources\RestaurantResource;

class RestaurantApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::with('types');

        if ($request->has('types')) {
            $categories = explode(',', $request->input('types'));
            $query->whereHas('types', function ($q) use ($categories) {
                $q->whereIn('name', $categories);
            });
        }

        $restaurants = $query->get();

        return RestaurantResource::collection($restaurants);
    }
}
