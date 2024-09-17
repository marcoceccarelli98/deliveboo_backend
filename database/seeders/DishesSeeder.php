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
        // PIATTI CON PATH IMG CORRETTA (RISTORANTE 1)
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

        // Restaurant 2: X
        $this->createDish(2, "Pizza Margherita", "Pizza classica napoletana con pomodoro San Marzano, mozzarella di bufala DOP e basilico fresco.", 8.50);
        $this->createDish(2, "Spaghetti Vongole", "Spaghetti conditi con vongole veraci, aglio, olio extravergine d'oliva e un pizzico di peperoncino.", 13.50);

        // Restaurant 3: X
        $this->createDish(3, "Bistecca Fiorentina", "Iconica bistecca di manzo cotta alla griglia, servita con contorno di fagioli bianchi e patate arrosto.", 28.00);
        $this->createDish(3, "Pappardelle al Cinghiale", "Pappardelle fatte in casa con ragù di cinghiale, cotto lentamente con vino rosso e spezie toscane.", 16.00);

        // Restaurant 4: X
        $this->createDish(4, "Pizza Frutti di Mare", "Pizza condita con gamberi, cozze, calamari e un tocco di prezzemolo fresco, su una base di pomodoro e mozzarella.", 12.00);
        $this->createDish(4, "Spaghetti allo Scoglio", "Un piatto di spaghetti ricco di sapori marini, con gamberi, cozze, vongole e calamari in salsa di pomodoro leggermente piccante.", 14.00);

        // Restaurant 5: X
        $this->createDish(5, "Tagliatelle al Tartufo", "Pasta fresca fatta a mano condita con una crema di burro e scaglie di tartufo nero, per un sapore ricco e intenso.", 19.00);
        $this->createDish(5, "Cinghiale in Umido", "Cinghiale cucinato lentamente con vino rosso, erbe aromatiche e spezie, servito con polenta cremosa.", 22.00);

        // Restaurant 6: Sushi Shangai
        $this->createDish(6, "Sushi Misto", "Assortimento di nigiri e maki con pesce fresco del giorno", 18.00);
        $this->createDish(6, "Ramen di Maiale", "Zuppa di noodles con maiale chashu, uovo sodo, alghe nori e verdure", 14.00);
        $this->createDish(6, "Gyoza", "Ravioli giapponesi ripieni di carne e verdure, serviti con salsa di soia", 8.00);

        // Restaurant 7: Sushi Kisaragi
        $this->createDish(7, "Sashimi Deluxe", "Selezione premium di sashimi freschissimo", 25.00);
        $this->createDish(7, "Uramaki Special", "Roll di sushi invertito con salmone, avocado e philadelphia", 16.00);
        $this->createDish(7, "Tempura Moriawase", "Assortimento di tempura di gamberi e verdure", 20.00);
        $this->createDish(7, "Chirashi", "Ciotola di riso con pesce crudo assortito e verdure", 22.00);

        // Restaurant 8: Sushi Tsunami
        $this->createDish(8, "Dragon Roll", "Uramaki con gambero in tempura, avocado e salsa teriyaki", 18.00);
        $this->createDish(8, "Nigiri Mix", "Assortimento di nigiri con tonno, salmone, branzino e gambero", 20.00);
        $this->createDish(8, "Miso Soup", "Zuppa tradizionale giapponese con tofu e alghe wakame", 6.00);

        // Restaurant 9: Jin Yong
        $this->createDish(9, "Anatra Pechino", "Anatra croccante servita con pancake, cipollotti e salsa hoisin", 28.00);
        $this->createDish(9, "Dim Sum Assortiti", "Selezione di ravioli al vapore con ripieni vari", 15.00);
        $this->createDish(9, "Mapo Tofu", "Tofu piccante con carne macinata e peperoncino del Sichuan", 12.00);
        $this->createDish(9, "Riso Cantonese", "Riso saltato con gamberi, piselli, prosciutto e uova", 10.00);

        // Restaurant 10: Ristorante Mao
        $this->createDish(10, "Pollo Kung Pao", "Pollo saltato con arachidi, peperoni e salsa piccante", 14.00);
        $this->createDish(10, "Spaghetti di Soia", "Spaghetti di soia saltati con verdure e carne a scelta", 12.00);
        $this->createDish(10, "Involtini Primavera", "Involtini croccanti ripieni di verdure, serviti con salsa agrodolce", 8.00);

        // Restaurant 11: Ji Li Ravioleria
        $this->createDish(11, "Ravioli al Vapore", "Ravioli ripieni di carne di maiale e verdure, cotti al vapore", 10.00);
        $this->createDish(11, "Ravioli Fritti", "Ravioli croccanti ripieni di carne e verdure", 11.00);
        $this->createDish(11, "Zuppa di Ravioli", "Delicata zuppa con ravioli di gamberi", 13.00);
        $this->createDish(11, "Baozi", "Panini al vapore ripieni di carne di maiale", 9.00);

        // Restaurant 12: Jamm Ja - Pizze e Fritti
        $this->createDish(12, "Pizza Fritta", "Pizza fritta ripiena di ricotta, pomodoro e prosciutto cotto", 10.00);
        $this->createDish(12, "Montanara", "Pizza fritta con pomodoro, basilico e parmigiano", 9.00);
        $this->createDish(12, "Crocchè di Patate", "Crocchette di patate fritte, tipiche della tradizione napoletana", 6.00);
        $this->createDish(12, "Frittatina di Pasta", "Frittatina di pasta con besciamella, piselli e prosciutto", 7.00);

        // Restaurant 13: Osteria da Zio Ninì
        $this->createDish(13, "Pasta alla Norma", "Pasta con melanzane fritte, pomodoro, ricotta salata e basilico", 12.00);
        $this->createDish(13, "Caponata", "Antipasto siciliano di verdure in agrodolce", 8.00);
        $this->createDish(13, "Involtini di Pesce Spada", "Involtini di pesce spada con pangrattato, pinoli e uvetta", 16.00);

        // Restaurant 14: Girarrosti Santa Rita
        $this->createDish(14, "Pollo allo Spiedo", "Mezzo pollo arrosto con patate e rosmarino", 14.00);
        $this->createDish(14, "Costine di Maiale", "Costine di maiale marinate e cotte lentamente", 16.00);
        $this->createDish(14, "Arrosto Misto", "Selezione di carni arrosto con contorno di verdure grigliate", 20.00);
        $this->createDish(14, "Patate al Forno", "Patate arrosto con rosmarino e aglio", 6.00);

        // Restaurant 15: Ristorante Indiano Shiva
        $this->createDish(15, "Chicken Tikka Masala", "Bocconcini di pollo in salsa cremosa di pomodoro e spezie", 14.00);
        $this->createDish(15, "Naan", "Pane indiano cotto nel forno tandoor", 3.00);
        $this->createDish(15, "Biryani di Agnello", "Riso basmati con agnello, spezie e frutta secca", 16.00);
        $this->createDish(15, "Palak Paneer", "Formaggio indiano con spinaci e spezie", 12.00);

        // Restaurant 16: Tara Ristorante Indiano
        $this->createDish(16, "Butter Chicken", "Pollo tikka in una ricca salsa al burro e pomodoro", 16.00);
        $this->createDish(16, "Samosa", "Fagottini fritti ripieni di patate e piselli speziati", 6.00);
        $this->createDish(16, "Tandoori Mixed Grill", "Assortimento di carni marinate e cotte nel forno tandoor", 22.00);

        // Restaurant 17: Ristorante Indiano Just India
        $this->createDish(17, "Dal Makhani", "Lenticchie nere cotte lentamente con burro e spezie", 12.00);
        $this->createDish(17, "Chicken Vindaloo", "Pollo in salsa piccante con patate, specialità di Goa", 15.00);
        $this->createDish(17, "Malai Kofta", "Polpette di formaggio e patate in salsa cremosa", 14.00);

        // Restaurant 18: Indian Restaurant and Take Away
        $this->createDish(18, "Lamb Rogan Josh", "Agnello cotto lentamente in salsa di yogurt e spezie", 18.00);
        $this->createDish(18, "Vegetable Biryani", "Riso basmati con verdure miste e spezie", 13.00);
        $this->createDish(18, "Raita", "Yogurt con cetrioli e spezie, perfetto per bilanciare i piatti piccanti", 4.00);

        // Restaurant 19: Viaggi nel Gusto
        $this->createDish(19, "Paella Valenciana", "Riso con pollo, coniglio, verdure e zafferano", 20.00);
        $this->createDish(19, "Tacos al Pastor", "Tacos con carne di maiale marinata e ananas", 12.00);
        $this->createDish(19, "Pad Thai", "Noodles di riso saltati con gamberi, tofu, arachidi e germogli di soia", 14.00);

        // Restaurant 20: La Locanda del Gatto Rosso
        $this->createDish(20, "Risotto ai Funghi Porcini", "Risotto cremoso con funghi porcini freschi", 18.00);
        $this->createDish(20, "Ossobuco alla Milanese", "Stinco di vitello con gremolada, servito con risotto allo zafferano", 24.00);
        $this->createDish(20, "Tiramisù", "Classico dessert italiano con savoiardi, caffè e crema al mascarpone", 7.00);

        // Restaurant 21: Ristorante Qui Si Mangia
        $this->createDish(21, "Lasagne alla Bolognese", "Strati di pasta all'uovo con ragù di carne e besciamella", 14.00);
        $this->createDish(21, "Gnocchi al Gorgonzola", "Gnocchi di patate in crema di gorgonzola e noci", 13.00);
        $this->createDish(21, "Scaloppine al Limone", "Fettine di vitello in salsa al limone", 16.00);

        // Restaurant 22: Trattoria de la Trebia Milano
        $this->createDish(22, "Cassoeula", "Piatto tipico milanese con verze e carne di maiale", 18.00);
        $this->createDish(22, "Risotto al Salto", "Risotto allo zafferano croccante", 15.00);
        $this->createDish(22, "Mondeghili", "Polpette fritte tipiche milanesi", 10.00);

        // Restaurant 23: Primè
        $this->createDish(23, "Tartare di Manzo", "Carne cruda di manzo condita con capperi, acciughe e tuorlo d'uovo", 16.00);
        $this->createDish(23, "Spaghetti alle Vongole Veraci", "Spaghetti con vongole fresche, aglio e prezzemolo", 18.00);
        $this->createDish(23, "Branzino al Sale", "Branzino intero cotto al forno sotto sale marino", 25.00);

        // Restaurant 24: Gloria Osteria
        $this->createDish(24, "Pappardelle al Cinghiale", "Pappardelle fatte in casa con ragù di cinghiale", 16.00);
        $this->createDish(24, "Tagliata di Manzo", "Controfiletto di manzo alla griglia con rucola e scaglie di parmigiano", 22.00);
        $this->createDish(24, "Panna Cotta ai Frutti di Bosco", "Dolce cremoso con coulis di frutti di bosco", 7.00);

        // Restaurant 25: Piz
        $this->createDish(25, "Pizza Quattro Formaggi", "Pizza con mozzarella, gorgonzola, parmigiano e fontina", 12.00);
        $this->createDish(25, "Pizza Diavola", "Pizza piccante con salame piccante e peperoncino", 11.00);
        $this->createDish(25, "Calzone Ripieno", "Calzone farcito con prosciutto, funghi e mozzarella", 13.00);

        // Restaurant 26: Pizza Am
        $this->createDish(26, "Pizza Bufala e Crudo", "Pizza con mozzarella di bufala e prosciutto crudo", 14.00);
        $this->createDish(26, "Pizza Vegetariana", "Pizza con verdure grigliate miste", 11.00);
        $this->createDish(26, "Focaccia al Rosmarino", "Focaccia sottile con olio d'oliva e rosmarino", 6.00);

        // Restaurant 27: Assaje
        $this->createDish(27, "Pizza Fritta", "Pizza fritta ripiena di ricotta e salame", 10.00);
        $this->createDish(27, "Spaghetti alle Vongole", "Spaghetti con vongole fresche e prezzemolo", 15.00);
        $this->createDish(27, "Parmigiana di Melanzane", "Melanzane gratinate con pomodoro, mozzarella e parmigiano", 12.00);

        // Restaurant 28: Pizzium
        $this->createDish(28, "Pizza Napoli", "Pizza con acciughe, capperi e olive", 11.00);
        $this->createDish(28, "Pizza Porcini e Tartufo", "Pizza con funghi porcini e tartufo nero", 16.00);
        $this->createDish(28, "Pizza Margherita DOP", "Pizza con pomodoro San Marzano e mozzarella di bufala DOP", 10.00);

        // Restaurant 29: Osaka
        $this->createDish(29, "Sushi Misto", "Assortimento di nigiri e maki del giorno", 22.00);
        $this->createDish(29, "Tempura Moriawase", "Frittura mista di gamberi e verdure in pastella leggera", 18.00);
        $this->createDish(29, "Ramen Tonkotsu", "Zuppa di noodles con brodo di maiale, uovo sodo e nori", 14.00);

        // Restaurant 30: Poporoya
        $this->createDish(30, "Chirashi Deluxe", "Ciotola di riso con sashimi misto di alta qualità", 25.00);
        $this->createDish(30, "Uramaki California", "Roll di sushi con avocado, granchio e cetriolo", 12.00);
        $this->createDish(30, "Gyoza", "Ravioli giapponesi alla piastra ripieni di carne e verdure", 8.00);
    }

    private function createDish($restaurantId, $name, $description, $price)
    {
        $newDish = new Dish();
        $newDish->restaurant_id = $restaurantId;
        $newDish->name = $name;
        $newDish->description = $description;
        $newDish->price = $price;
        $newDish->visibility = 1;
        $newDish->slug = Str::of($name)->slug('-');
        $newDish->path_img = 'dishes/default-dish.jpg';
        $newDish->save();
    }
}
