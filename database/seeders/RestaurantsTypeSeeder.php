<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RestaurantsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disabilita le restrizioni di chiave esterna nel caso ci siano
        Schema::disableForeignKeyConstraints();

        // Svuota la tabella di associazione
        DB::table('restaurant_type')->truncate();

        // Definisci le associazioni tra ristoranti e tipi
        $associazioni = [
            ['restaurant_id' => 1, 'type_id' => 1], // La Dolce Vita - Italiano
            ['restaurant_id' => 1, 'type_id' => 7], // La Dolce Vita - Fast Food
            ['restaurant_id' => 2, 'type_id' => 2], // Bella Napoli - Cinese
            ['restaurant_id' => 3, 'type_id' => 3], // Osteria del Chianti - Indiano
            ['restaurant_id' => 3, 'type_id' => 6], // Osteria del Chianti - Vegetariano
            ['restaurant_id' => 4, 'type_id' => 4], // Mare e Montio - Giapponese
            ['restaurant_id' => 5, 'type_id' => 5], // Al Vecchio Mulino - Messicano
            // Aggiungi altre associazioni se necessario
        ];

        // Inserisci le associazioni nella tabella
        DB::table('restaurant_type')->insert($associazioni);

        // Riabilita le restrizioni di chiave esterna
        Schema::enableForeignKeyConstraints();
    }
}
