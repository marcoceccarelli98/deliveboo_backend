<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DishesOrdersSeeder extends Seeder
{
    /**
     * Esegui il seeding dei dati della tabella pivot dishes_orders.
     */
    public function run(): void
    {
        $orders = Order::where('restaurant_id', 1)->get();
        $dishes = Dish::where('restaurant_id', 1)->get();

        foreach ($orders as $order) {
            // Seleziona casualmente da 1 a 3 piatti per ogni ordine
            $numberOfDishes = rand(1, 3);
            $selectedDishes = $dishes->random($numberOfDishes);

            foreach ($selectedDishes as $dish) {
                // Genera una quantità casuale tra 1 e 3 per ogni piatto
                $quantity = rand(1, 3);

                DB::table('dishes_orders')->insert([
                    'dish_id' => $dish->id,
                    'order_id' => $order->id,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
