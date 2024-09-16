<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DishResource;

class RestaurantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->companyName,
            'slug' => $this->slug,
            'address' => $this->address,
            'city' => $this->city,
            'image' => $this->path_img ? asset($this->path_img) : null,
            'dishes' => DishResource::collection($this->whenLoaded('dishes')),
        ];
    }
}
