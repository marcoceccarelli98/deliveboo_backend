<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    // Utilizza 'slug' come chiave di ricerca per le rotte
    protected $fillable = ['name', 'price', 'description', 'slug', 'visibility'];

    //Relazione One to Many con Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    //Relazione Many to Many con Order
    public function orders()
    {
        return $this->BelongsToMany(Order::class, 'dishes_orders')->withPivot('quantity');
    }
}
