<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'companyName',
        'address',
        'pIva',
        'city',
        'path_img',
        'slug',
    ];

    //Relazione One to One con User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Relazione Many to Many con Type
    public function types()
    {
        return $this->BelongsToMany(Type::class);
    }

    //Relazione One to Many con Dish
    public function dishes()
    {
        return $this->hasMany(Dish::class);
    }

    //Relazione One to Many con Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
