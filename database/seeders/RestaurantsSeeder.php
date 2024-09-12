<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 1;
        $newRestaurant->user_id = 1;
        $newRestaurant->companyName = "La Dolce Vita";
        $newRestaurant->address = "Via Roma, 25";
        $newRestaurant->pIva = "12345678901";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->path_img = '/restaurants/la-dolce-vita.jpg';
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 2;
        $newRestaurant->user_id = 2;
        $newRestaurant->companyName = "Bella Napoli";
        $newRestaurant->address = "Corso Garibaldi, 98";
        $newRestaurant->pIva = "98765432102";
        $newRestaurant->city = "Napoli";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 3;
        $newRestaurant->user_id = 3;
        $newRestaurant->companyName = "Osteria del Chianti";
        $newRestaurant->address = "Piazza San Marco, 12";
        $newRestaurant->pIva = "23456789012";
        $newRestaurant->city = "Firenze";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 4;
        $newRestaurant->user_id = 4;
        $newRestaurant->companyName = "Mare e Monti";
        $newRestaurant->address = "Via del Mare, 45";
        $newRestaurant->pIva = "34567890123";
        $newRestaurant->city = "Genova";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 5;
        $newRestaurant->user_id = 5;
        $newRestaurant->companyName = "Al Vecchio Mulino";
        $newRestaurant->address = "Via delle Rose, 7";
        $newRestaurant->pIva = "45678901234";
        $newRestaurant->city = "Roma";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();
    }
}
