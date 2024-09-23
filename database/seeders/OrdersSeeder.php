<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Mario Rossi';
        $newOrder->customer_email = 'mario.rossi@email.com';
        $newOrder->customer_address = 'Via Roma 123, Milano';
        $newOrder->total = 45.00;
        $newOrder->save();

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Giulia Bianchi';
        $newOrder->customer_email = 'giulia.bianchi@email.com';
        $newOrder->customer_address = 'Corso Italia 456, Roma';
        $newOrder->total = 38.00;
        $newOrder->save();

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Luca Verdi';
        $newOrder->customer_email = 'luca.verdi@email.com';
        $newOrder->customer_address = 'Piazza Garibaldi 789, Napoli';
        $newOrder->total = 39.00;
        $newOrder->save();

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Francesca Neri';
        $newOrder->customer_email = 'francesca.neri@email.com';
        $newOrder->customer_address = 'Viale dei Giardini 101, Firenze';
        $newOrder->total = 46.00;
        $newOrder->save();

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Alessandro Gialli';
        $newOrder->customer_email = 'alessandro.gialli@email.com';
        $newOrder->customer_address = 'Via Dante 202, Torino';
        $newOrder->total = 37.00;
        $newOrder->save();

        $newOrder = new Order();
        $newOrder->restaurant_id = 1;
        $newOrder->customer_name = 'Valentina Azzurri';
        $newOrder->customer_email = 'valentina.azzurri@email.comm';
        $newOrder->customer_address = 'Corso Vittorio Emanuele 303, Bologna';
        $newOrder->total = 40.00;
        $newOrder->save();

    }
}
