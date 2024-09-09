<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    //Relazione One to Many con Restaurant
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
