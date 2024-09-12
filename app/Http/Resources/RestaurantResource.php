<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'companyName' => $this->companyName,
            'city' => $this->city,
            'address' => $this->address,
            'types' => $this->types->pluck('name'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            // Altri campi che vuoi includere
        ];
    }
}
