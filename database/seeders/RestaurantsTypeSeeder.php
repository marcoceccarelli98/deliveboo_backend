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
            ['restaurant_id' => 1, 'type_id' => 1],  // La Dolce Vita - Italiano
            ['restaurant_id' => 2, 'type_id' => 1],  // Bella Napoli - Italiano
            ['restaurant_id' => 3, 'type_id' => 1],  // Osteria del Chianti - Italiano
            ['restaurant_id' => 4, 'type_id' => 1],  // Mare e Monti - Italiano
            ['restaurant_id' => 5, 'type_id' => 1],  // Al Vecchio Mulino - Italiano
            ['restaurant_id' => 6, 'type_id' => 4],  // Sushi Shangai - Giapponese
            ['restaurant_id' => 6, 'type_id' => 2],  // Sushi Shangai - Cinese
            ['restaurant_id' => 7, 'type_id' => 4],  // Sushi Kisaragi - Giapponese
            ['restaurant_id' => 8, 'type_id' => 4],  // Sushi Tsunami - Giapponese
            ['restaurant_id' => 9, 'type_id' => 2],  // Jin Yong - Cinese
            ['restaurant_id' => 10, 'type_id' => 2], // Ristorante Mao - Cinese
            ['restaurant_id' => 11, 'type_id' => 2], // Ji Li Ravioleria - Cinese
            ['restaurant_id' => 12, 'type_id' => 1], // Jamm Ja - Pizze e Fritti - Italiano
            ['restaurant_id' => 12, 'type_id' => 7], // Jamm Ja - Pizze e Fritti - Fast Food
            ['restaurant_id' => 13, 'type_id' => 1], // Osteria da Zio Ninì - Italiano
            ['restaurant_id' => 14, 'type_id' => 1], // Girarrosti Santa Rita - Italiano
            ['restaurant_id' => 15, 'type_id' => 3], // Ristorante Indiano Shiva - Indiano
            ['restaurant_id' => 16, 'type_id' => 3], // Tara Ristorante Indiano - Indiano
            ['restaurant_id' => 17, 'type_id' => 3], // Ristorante Indiano Just India - Indiano
            ['restaurant_id' => 18, 'type_id' => 3], // Indian Restaurant and Take Away - Indiano
            ['restaurant_id' => 19, 'type_id' => 5], // Viaggi nel Gusto - Messicano
            ['restaurant_id' => 19, 'type_id' => 8], // Viaggi nel Gusto - Internazionale
            ['restaurant_id' => 20, 'type_id' => 1], // La Locanda del Gatto Rosso - Italiano
            ['restaurant_id' => 21, 'type_id' => 1], // Ristorante Qui Si Mangia - Italiano
            ['restaurant_id' => 22, 'type_id' => 1], // Trattoria de la Trebia Milano - Italiano
            ['restaurant_id' => 23, 'type_id' => 1], // Primè - Italiano
            ['restaurant_id' => 24, 'type_id' => 1], // Gloria Osteria - Italiano
            ['restaurant_id' => 25, 'type_id' => 1], // Piz - Italiano
            ['restaurant_id' => 25, 'type_id' => 7], // Piz - Fast Food
            ['restaurant_id' => 26, 'type_id' => 1], // Pizza Am - Italiano
            ['restaurant_id' => 26, 'type_id' => 7], // Pizza Am - Fast Food
            ['restaurant_id' => 27, 'type_id' => 1], // Assaje - Italiano
            ['restaurant_id' => 28, 'type_id' => 1], // Pizzium - Italiano
            ['restaurant_id' => 29, 'type_id' => 4], // Osaka - Giapponese
            ['restaurant_id' => 30, 'type_id' => 4], // Poporoya - Giapponese
        ];

        // Inserisci le associazioni nella tabella
        DB::table('restaurant_type')->insert($associazioni);

        // Riabilita le restrizioni di chiave esterna
        Schema::enableForeignKeyConstraints();
    }
}