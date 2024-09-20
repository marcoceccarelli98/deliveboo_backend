<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //Relazione One to Many con Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    //Relazione Many to Many con Dish
    public function dishes()
    {
        return $this->BelongsToMany(Dish::class, 'dishes_orders')->withPivot('quantity');;
    }
}
