<?php

namespace Database\Seeders;

use App\Models\Dish;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Risotto Zafferano";
        $newDish->description = "Cremoso risotto preparato con zafferano e parmigiano, tipico della tradizione milanese.";
        $newDish->price = 14.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/risotto-allo-zafferano.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Cotoletta Milanese";
        $newDish->description = "Taglio di carne di vitello impanato e fritto, servito con una leggera insalata di rucola e pomodorini.";
        $newDish->price = 18.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/cotoletta-alla-milanese.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 2;
        $newDish->name = "Pizza Margherita";
        $newDish->description = "Pizza classica napoletana con pomodoro San Marzano, mozzarella di bufala DOP e basilico fresco.";
        $newDish->price = 8.50;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 2;
        $newDish->name = "Spaghetti Vongole";
        $newDish->description = "Spaghetti conditi con vongole veraci, aglio, olio extravergine d'oliva e un pizzico di peperoncino.";
        $newDish->price = 13.50;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 3;
        $newDish->name = "Bistecca Fiorentina";
        $newDish->description = "Iconica bistecca di manzo cotta alla griglia, servita con contorno di fagioli bianchi e patate arrosto.";
        $newDish->price = 28.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 3;
        $newDish->name = "Pappardelle Cinghial";
        $newDish->description = "Pappardelle fatte in casa con ragù di cinghiale, cotto lentamente con vino rosso e spezie toscane.";
        $newDish->price = 16.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 4;
        $newDish->name = "Pizza Frutti Mare";
        $newDish->description = "Pizza condita con gamberi, cozze, calamari e un tocco di prezzemolo fresco, su una base di pomodoro e mozzarella.";
        $newDish->price = 12.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 4;
        $newDish->name = "Spaghetti Scoglio";
        $newDish->description = "Un piatto di spaghetti ricco di sapori marini, con gamberi, cozze, vongole e calamari in salsa di pomodoro leggermente piccante.";
        $newDish->price = 14.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 5;
        $newDish->name = "Tagliatelle Tartufo";
        $newDish->description = "Pasta fresca fatta a mano condita con una crema di burro e scaglie di tartufo nero, per un sapore ricco e intenso.";
        $newDish->price = 19.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 5;
        $newDish->name = "Cinghiale Umido";
        $newDish->description = "Cinghiale cucinato lentamente con vino rosso, erbe aromatiche e spezie, servito con polenta cremosa.";
        $newDish->price = 22.00;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'abc';
        $newDish->save();
    }
}
