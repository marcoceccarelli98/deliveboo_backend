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

        $newUser = new User();
        $newUser->id = 6;
        $newUser->name = "Chen Wei";
        $newUser->email = "chen.wei@sushishangai.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 7;
        $newUser->name = "Yuki Tanaka";
        $newUser->email = "yuki.tanaka@sushikisaragi.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 8;
        $newUser->name = "Hiroshi Sato";
        $newUser->email = "hiroshi.sato@sushitsunami.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 9;
        $newUser->name = "Li Mei";
        $newUser->email = "li.mei@jinyong.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 10;
        $newUser->name = "Zhang Wei";
        $newUser->email = "zhang.wei@ristorantemao.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 11;
        $newUser->name = "Wang Fang";
        $newUser->email = "wang.fang@jiliravioleria.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 12;
        $newUser->name = "Gennaro Esposito";
        $newUser->email = "gennaro.esposito@jammja.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 13;
        $newUser->name = "Antonio Russo";
        $newUser->email = "antonio.russo@osteriazionini.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 14;
        $newUser->name = "Francesca Colombo";
        $newUser->email = "francesca.colombo@girarrosti.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 15;
        $newUser->name = "Raj Patel";
        $newUser->email = "raj.patel@shiva.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 16;
        $newUser->name = "Priya Singh";
        $newUser->email = "priya.singh@tararistorante.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 17;
        $newUser->name = "Amit Sharma";
        $newUser->email = "amit.sharma@justindia.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 18;
        $newUser->name = "Ananya Gupta";
        $newUser->email = "ananya.gupta@indiantakeaway.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 19;
        $newUser->name = "Luca Moretti";
        $newUser->email = "luca.moretti@viagginelgusto.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 20;
        $newUser->name = "Sofia Ferrari";
        $newUser->email = "sofia.ferrari@locandagattorosso.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 21;
        $newUser->name = "Matteo Romano";
        $newUser->email = "matteo.romano@quisiamangia.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 22;
        $newUser->name = "Elena Ricci";
        $newUser->email = "elena.ricci@trattoriatrebia.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 23;
        $newUser->name = "Davide Marino";
        $newUser->email = "davide.marino@prime.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 24;
        $newUser->name = "Chiara Fontana";
        $newUser->email = "chiara.fontana@gloriaosteria.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 25;
        $newUser->name = "Alessio Conti";
        $newUser->email = "alessio.conti@piz.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 26;
        $newUser->name = "Valentina Mancini";
        $newUser->email = "valentina.mancini@pizzaam.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 27;
        $newUser->name = "Roberto Ferrara";
        $newUser->email = "roberto.ferrara@assaje.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 28;
        $newUser->name = "Giorgia Santoro";
        $newUser->email = "giorgia.santoro@pizzium.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 29;
        $newUser->name = "Kenji Nakamura";
        $newUser->email = "kenji.nakamura@osaka.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();

        $newUser = new User();
        $newUser->id = 30;
        $newUser->name = "Akira Tanaka";
        $newUser->email = "akira.tanaka@poporoya.it";
        $newUser->password = '$2y$10$fKgplCb3P8jYqStrKLNTauGtWWKlFElhNCVYmyMjJMqLK0B7gbw.C';
        $newUser->save();;
    }
}
