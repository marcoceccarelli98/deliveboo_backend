<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $newUser = new User();
        $newUser->id = 1;
        $newUser->name = "Marco Rossi";
        $newUser->email = "marco.rossi@ladolcevita.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 2;
        $newUser->name = "Anna Esposito";
        $newUser->email = "anna.esposito@bellanapoli.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 3;
        $newUser->name = "Lorenzo Bianchi";
        $newUser->email = "lorenzo.bianchi@delchianti.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 4;
        $newUser->name = "Giulia Verdi";
        $newUser->email = "giulia.verdi@mareemonti.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 5;
        $newUser->name = "Paolo Gallo";
        $newUser->email = "paolo.gallo@vecchiomulino.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

    }
}
