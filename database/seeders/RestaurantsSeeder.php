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
        $newRestaurant->path_img = '/restaurants/la-dolce-vita.jpeg';
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

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 6;
        $newRestaurant->user_id = 6;
        $newRestaurant->companyName = "Sushi Shangai";
        $newRestaurant->address = "Piazza Navona, 17";
        $newRestaurant->pIva = "011095749700";
        $newRestaurant->city = "Roma";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();
        
        $newRestaurant = new Restaurant();
        $newRestaurant->id = 7;
        $newRestaurant->user_id = 7;
        $newRestaurant->companyName = "Sushi Kisaragi";
        $newRestaurant->address = "Piazza Marini, 127";
        $newRestaurant->pIva = "153544092819";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 8;
        $newRestaurant->user_id = 8;
        $newRestaurant->companyName = "Sushi Tsunami";
        $newRestaurant->address = "Piazza Cusano, 52";
        $newRestaurant->pIva = "862731281218";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();
        
        $newRestaurant = new Restaurant();
        $newRestaurant->id = 9;
        $newRestaurant->user_id = 9;
        $newRestaurant->companyName = "Jin Yong";
        $newRestaurant->address = "Via Gustavo Fara, 15";
        $newRestaurant->pIva = "252689523567";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 10;
        $newRestaurant->user_id = 10;
        $newRestaurant->companyName = "Ristorante Mao";
        $newRestaurant->address = "Via Porpora, 23";
        $newRestaurant->pIva = "007678119162";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 11;
        $newRestaurant->user_id = 11;
        $newRestaurant->companyName = "Ji Li Ravioleria";
        $newRestaurant->address = "Viale Sabotino, 13";
        $newRestaurant->pIva = "948563919248";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 12;
        $newRestaurant->user_id = 12;
        $newRestaurant->companyName = "Jamm Ja - Pizze e Fritti";
        $newRestaurant->address = "Via Carlo Freguglia, 2";
        $newRestaurant->pIva = "160480187305";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 13;
        $newRestaurant->user_id = 13;
        $newRestaurant->companyName = "Osteria da Zio Ninì";
        $newRestaurant->address = "Via Tibullo, 10";
        $newRestaurant->pIva = "532346527896";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 14;
        $newRestaurant->user_id = 14;
        $newRestaurant->companyName = "Girarrosti Santa Rita";
        $newRestaurant->address = "Viale Coni Zugna, 43";
        $newRestaurant->pIva = "320938310870";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 15;
        $newRestaurant->user_id = 15;
        $newRestaurant->companyName = "Ristorante Indiano Shiva";
        $newRestaurant->address = "Viale Gian Galeazzo, 7";
        $newRestaurant->pIva = "557717489934";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 16;
        $newRestaurant->user_id = 16;
        $newRestaurant->companyName = "Tara Ristorante Indiano";
        $newRestaurant->address = "Via Domenico Cirillo, 16";
        $newRestaurant->pIva = "362456234368";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 17;
        $newRestaurant->user_id = 17;
        $newRestaurant->companyName = "Ristorante Indiano Just India";
        $newRestaurant->address = "Via Benedetto Marcello, 34";
        $newRestaurant->pIva = "745609445597";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();
        
        $newRestaurant = new Restaurant();
        $newRestaurant->id = 18;
        $newRestaurant->user_id = 18;
        $newRestaurant->companyName = "Indian Restaurant and Take Away";
        $newRestaurant->address = "Via Errico Petrella, 19";
        $newRestaurant->pIva = "354463405973";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 19;
        $newRestaurant->user_id = 19;
        $newRestaurant->companyName = "Viaggi nel Gusto";
        $newRestaurant->address = "Via Edmondo de Amicis, 24";
        $newRestaurant->pIva = "388147818106";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 20;
        $newRestaurant->user_id = 20;
        $newRestaurant->companyName = "La Locanda del Gatto Rosso";
        $newRestaurant->address = "Via Ugo Foscolo, 3";
        $newRestaurant->pIva = "240977812216";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 21;
        $newRestaurant->user_id = 21;
        $newRestaurant->companyName = "Ristorante Qui Si Mangia";
        $newRestaurant->address = "Via Gerolamo Cardano, 2";
        $newRestaurant->pIva = "024760242634";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 22;
        $newRestaurant->user_id = 22;
        $newRestaurant->companyName = "Trattoria de la Trebia Milano";
        $newRestaurant->address = "Via Trebbia, 32";
        $newRestaurant->pIva = "482106406286";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 23;
        $newRestaurant->user_id = 23;
        $newRestaurant->companyName = "Primè";
        $newRestaurant->address = "Viale Francesco Crispi, 2";
        $newRestaurant->pIva = "900091519680";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 24;
        $newRestaurant->user_id = 24;
        $newRestaurant->companyName = "Gloria Osteria";
        $newRestaurant->address = "Via Tivoli, 3";
        $newRestaurant->pIva = "486282132761";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 25;
        $newRestaurant->user_id = 25;
        $newRestaurant->companyName = "Piz";
        $newRestaurant->address = "Via Torino, 34";
        $newRestaurant->pIva = "426037473471";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 26;
        $newRestaurant->user_id = 26;
        $newRestaurant->companyName = "Pizza Am";
        $newRestaurant->address = "Corso di Porta Romana, 83";
        $newRestaurant->pIva = "221130297462";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 27;
        $newRestaurant->user_id = 27;
        $newRestaurant->companyName = "Assaje";
        $newRestaurant->address = "Via Traù, 2";
        $newRestaurant->pIva = "809319895826";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 28;
        $newRestaurant->user_id = 28;
        $newRestaurant->companyName = "Pizzium";
        $newRestaurant->address = "Via Giulio Cesare Procaccini, 30";
        $newRestaurant->pIva = "474265707827";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 29;
        $newRestaurant->user_id = 29;
        $newRestaurant->companyName = "Osaka";
        $newRestaurant->address = "Corso Garibaldi, 68";
        $newRestaurant->pIva = "134797751049";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();

        $newRestaurant = new Restaurant();
        $newRestaurant->id = 30;
        $newRestaurant->user_id = 30;
        $newRestaurant->companyName = "Poporoya";
        $newRestaurant->address = "Via Bartolomeo Eustachi, 17";
        $newRestaurant->pIva = "745506396270";
        $newRestaurant->city = "Milano";
        $newRestaurant->slug = Str::of($newRestaurant->companyName)->slug('-');
        $newRestaurant->save();
    }
}
