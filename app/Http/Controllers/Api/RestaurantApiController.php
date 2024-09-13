<?php

// app/Http/Controllers/Api/RestaurantApiController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use App\Http\Resources\RestaurantResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RestaurantApiController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::with('types');

        if ($request->has('types')) {
            $types = explode(',', $request->input('types'));
            $typeCount = count($types);

            $query->whereHas('types', function ($q) use ($types) {
                $q->whereIn('name', $types);
            }, '=', $typeCount);
        }

        $restaurants = $query->get();

        return RestaurantResource::collection($restaurants);
    }

    public function show($slug)
    {
        try {
            $restaurant = Restaurant::with(['dishes' => function ($query) {
                $query->where('visibility', true);
            }])->where('slug', $slug)->firstOrFail();

            return new RestaurantResource($restaurant);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Restaurant not found'
            ], 404);
        }
    }
}
