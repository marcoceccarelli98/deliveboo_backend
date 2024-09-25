<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrdersSeeder extends Seeder
{
    /**
     * Esegui il seeding dei dati della tabella orders.
     */
    public function run(): void
    {
        $faker = Faker::create('it_IT');

        for ($i = 0; $i < 1000; $i++) {
            $newOrder = new Order();
            $newOrder->restaurant_id = 1; // Assumiamo che tutti gli ordini siano per il ristorante con ID 1
            $newOrder->customer_name = $faker->name;
            $newOrder->customer_email = $faker->email;
            $newOrder->customer_address = $faker->address;
            $newOrder->total = $faker->randomFloat(2, 20, 100); // Genera un totale casuale tra 20 e 100 euro
            $newOrder->created_at = $faker->dateTimeBetween('2020-01-01', 'now');
            $newOrder->updated_at = $newOrder->created_at;
            $newOrder->save();
        }
    }
}
