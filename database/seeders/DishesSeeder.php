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

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Tagliolini Tartufo";
        $newDish->description = "Tagliolini freschi fatti a mano conditi con tartufo bianco pregiato e un filo di olio extravergine d'oliva. Un piatto raffinato e aromatico.";
        $newDish->price = 22.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/tagliolini-tartufo-bianco.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Ossobuco Milanese";
        $newDish->description = "Tenero ossobuco di vitello cucinato lentamente in un brodo di vino bianco e verdure, servito con gremolada e risotto allo zafferano.";
        $newDish->price = 24.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/ossobuco-alla-milanese.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Carpaccio di Manzo";
        $newDish->description = "Sottile carpaccio di manzo condito con rucola fresca, scaglie di parmigiano e un leggero dressing di limone e olio extravergine.";
        $newDish->price = 16.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/carpaccio-rucola-parmigiano.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Tiramisù Classico";
        $newDish->description = "Il tradizionale dolce italiano con strati di savoiardi, crema al mascarpone, caffè e cacao amaro.";
        $newDish->price = 7.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/tiramisu.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Gnocchi D'Alpino";
        $newDish->description = "Gnocchi con crema di formaggio e speck.";
        $newDish->price = 14.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/gnocchi-spek.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Penne Contadina";
        $newDish->description = "Pomodorini, cime di rapa e pecorino.";
        $newDish->price = 12.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/pasta-cime.jpg';
        $newDish->save();

        $newDish = new Dish();
        $newDish->restaurant_id = 1;
        $newDish->name = "Frittura d’Oro";
        $newDish->description = "Calamari croccanti e gamberi dorati.";
        $newDish->price = 7.00;
        $newDish->visibility =  1;
        $newDish->slug = Str::of($newDish->name)->slug('-');
        $newDish->path_img = 'dishes/frittura-oro.jpg';
        $newDish->save();

        $dishes = [
            // Restaurant 2: Bella Napoli
            ['restaurant_id' => 2, 'name' => "Pizza Margherita", 'description' => "Pizza classica napoletana con pomodoro San Marzano, mozzarella di bufala DOP e basilico fresco.", 'price' => 8.50, 'path_img' => 'dishes/pizza-margherita.jpg'],
            ['restaurant_id' => 2, 'name' => "Spaghetti Vongole", 'description' => "Spaghetti conditi con vongole veraci, aglio, olio extravergine d'oliva e un pizzico di peperoncino.", 'price' => 13.50, 'path_img' => 'dishes/spaghetti-vongole.jpg'],
            ['restaurant_id' => 2, 'name' => "Risotto Tramonto", 'description' => "Cremoso con zafferano e scampi.", 'price' => 18.50, 'path_img' => 'dishes/risotto-scampi.jpg'],
            ['restaurant_id' => 2, 'name' => "Tagliata di Mare", 'description' => "Tonno scottato con rucola e balsamico.", 'price' => 29.00, 'path_img' => 'dishes/tagliata-tonno.jpg'],
            ['restaurant_id' => 2, 'name' => "Farfalle Primavera", 'description' => "Verdure fresche e pesto leggero.", 'price' => 12.50, 'path_img' => 'dishes/farfalle-al-pesto.jpg'],
            ['restaurant_id' => 2, 'name' => "Pollo al Vulcano", 'description' => "Pollo piccante con salsa al peperoncino.", 'price' => 16.00, 'path_img' => 'dishes/pollo-piccante.jpg'],
            ['restaurant_id' => 2, 'name' => "Lasagna di Bosco", 'description' => "Funghi porcini e besciamella vellutata.", 'price' => 15.50, 'path_img' => 'dishes/lasagne-ai-funghi.jpg'],
            ['restaurant_id' => 2, 'name' => "Bistecca Gran Fiamma", 'description' => "Tenera manzo grigliata al punto giusto.", 'price' => 28.50, 'path_img' => 'dishes/bistecca.jpg'],
            ['restaurant_id' => 2, 'name' => "Tortino al Cuore Caldo", 'description' => "Cioccolato fondente con centro cremoso.", 'price' => 7.00, 'path_img' => 'dishes/Tortino-al-cioccolato.jpg'],

            // Restaurant 3: Osteria del Chianti
            ['restaurant_id' => 3, 'name' => "Bistecca Fiorentina", 'description' => "Iconica bistecca di manzo cotta alla griglia, servita con contorno di fagioli bianchi e patate arrosto.", 'price' => 28.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 3, 'name' => "Pappardelle Cinghiale", 'description' => "Pappardelle fatte in casa con ragù di cinghiale, cotto lentamente con vino rosso e spezie toscane.", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 4: Mare e Monti
            ['restaurant_id' => 4, 'name' => "Pizza Frutti Mare", 'description' => "Pizza condita con gamberi, cozze, calamari e un tocco di prezzemolo fresco, su una base di pomodoro e mozzarella.", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 4, 'name' => "Spaghetti Scoglio", 'description' => "Spaghetti con gamberi, cozze, vongole e calamari in salsa di pomodoro leggermente piccante.", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 5: Al Vecchio Mulino
            ['restaurant_id' => 5, 'name' => "Tagliatelle Tartufo", 'description' => "Pasta fresca fatta a mano condita con una crema di burro e scaglie di tartufo nero, per un sapore ricco e intenso.", 'price' => 19.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 5, 'name' => "Cinghiale Umido", 'description' => "Cinghiale cucinato lentamente con vino rosso, erbe aromatiche e spezie, servito con polenta cremosa.", 'price' => 22.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 6: Sushi Shangai
            ['restaurant_id' => 6, 'name' => "Sushi Misto", 'description' => "Assortimento di nigiri e maki con pesce fresco del giorno", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 6, 'name' => "Ramen di Maiale", 'description' => "Zuppa di noodles con maiale chashu, uovo sodo, alghe nori e verdure", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 6, 'name' => "Gyoza", 'description' => "Ravioli giapponesi ripieni di carne e verdure, serviti con salsa di soia", 'price' => 8.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 7: Sushi Kisaragi
            ['restaurant_id' => 7, 'name' => "Sashimi Deluxe", 'description' => "Selezione premium di sashimi freschissimo", 'price' => 25.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 7, 'name' => "Uramaki Special", 'description' => "Roll di sushi invertito con salmone, avocado e philadelphia", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 7, 'name' => "Tempura Moriawase", 'description' => "Assortimento di tempura di gamberi e verdure", 'price' => 20.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 8: Sushi Tsunami
            ['restaurant_id' => 8, 'name' => "Dragon Roll", 'description' => "Uramaki con gambero in tempura, avocado e salsa teriyaki", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 8, 'name' => "Nigiri Mix", 'description' => "Assortimento di nigiri con tonno, salmone, branzino e gambero", 'price' => 20.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 8, 'name' => "Miso Soup", 'description' => "Zuppa tradizionale giapponese con tofu e alghe wakame", 'price' => 6.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 9: Jin Yong
            ['restaurant_id' => 9, 'name' => "Anatra Pechino", 'description' => "Anatra croccante servita con pancake, cipollotti e salsa hoisin", 'price' => 28.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 9, 'name' => "Dim Sum Assortiti", 'description' => "Selezione di ravioli al vapore con ripieni vari", 'price' => 15.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 9, 'name' => "Mapo Tofu", 'description' => "Tofu piccante con carne macinata e peperoncino del Sichuan", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 10: Ristorante Mao
            ['restaurant_id' => 10, 'name' => "Pollo Kung Pao", 'description' => "Pollo saltato con arachidi, peperoni e salsa piccante", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 10, 'name' => "Spaghetti di Soia", 'description' => "Spaghetti di soia saltati con verdure e carne a scelta", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 10, 'name' => "Involtini Primavera", 'description' => "Involtini croccanti ripieni di verdure, serviti con salsa agrodolce", 'price' => 8.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 11: Ji Li Ravioleria
            ['restaurant_id' => 11, 'name' => "Ravioli al Vapore", 'description' => "Ravioli ripieni di carne di maiale e verdure, cotti al vapore", 'price' => 10.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 11, 'name' => "Ravioli Fritti", 'description' => "Ravioli croccanti ripieni di carne e verdure", 'price' => 11.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 11, 'name' => "Zuppa di Ravioli", 'description' => "Delicata zuppa con ravioli di gamberi", 'price' => 13.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 12: Jamm Ja - Pizze e Fritti
            ['restaurant_id' => 12, 'name' => "Pizza Fritta", 'description' => "Pizza fritta ripiena di ricotta, pomodoro e prosciutto cotto", 'price' => 10.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 12, 'name' => "Montanara", 'description' => "Pizza fritta con pomodoro, basilico e parmigiano", 'price' => 9.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 12, 'name' => "Crocchè di Patate", 'description' => "Crocchette di patate fritte, tipiche della tradizione napoletana", 'price' => 6.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 13: Osteria da Zio Ninì
            ['restaurant_id' => 13, 'name' => "Pasta alla Norma", 'description' => "Pasta con melanzane fritte, pomodoro, ricotta salata e basilico", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 13, 'name' => "Caponata", 'description' => "Antipasto siciliano di verdure in agrodolce", 'price' => 8.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 13, 'name' => "Involtini di Spada", 'description' => "Involtini di pesce spada con pangrattato, pinoli e uvetta", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 14: Girarrosti Santa Rita
            ['restaurant_id' => 14, 'name' => "Pollo allo Spiedo", 'description' => "Mezzo pollo arrosto con patate e rosmarino", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 14, 'name' => "Costine di Maiale", 'description' => "Costine di maiale marinate e cotte lentamente", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 14, 'name' => "Arrosto Misto", 'description' => "Selezione di carni arrosto con contorno di verdure grigliate", 'price' => 20.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 15: Ristorante Indiano Shiva
            ['restaurant_id' => 15, 'name' => "Chicken Tikka Masala", 'description' => "Bocconcini di pollo in salsa cremosa di pomodoro e spezie", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 15, 'name' => "Naan", 'description' => "Pane indiano cotto nel forno tandoor", 'price' => 3.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 15, 'name' => "Biryani di Agnello", 'description' => "Riso basmati con agnello, spezie e frutta secca", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 16: Tara Ristorante Indiano
            ['restaurant_id' => 16, 'name' => "Butter Chicken", 'description' => "Pollo tikka in una ricca salsa al burro e pomodoro", 'price' => 15.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 16, 'name' => "Samosa", 'description' => "Fagottini fritti ripieni di patate e piselli speziati", 'price' => 6.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 16, 'name' => "Tandoori Mix Grill", 'description' => "Assortimento di carni marinate e cotte nel forno tandoor", 'price' => 22.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 17: Ristorante Indiano Just India
            ['restaurant_id' => 17, 'name' => "Dal Makhani", 'description' => "Lenticchie nere cotte lentamente con burro e spezie", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 17, 'name' => "Chicken Vindaloo", 'description' => "Pollo in salsa piccante con patate, specialità di Goa", 'price' => 15.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 17, 'name' => "Malai Kofta", 'description' => "Polpette di formaggio e patate in salsa cremosa", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 18: Indian Restaurant and Take Away
            ['restaurant_id' => 18, 'name' => "Lamb Rogan Josh", 'description' => "Agnello cotto lentamente in salsa di yogurt e spezie", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 18, 'name' => "Vegetable Biryani", 'description' => "Riso basmati con verdure miste e spezie", 'price' => 13.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 18, 'name' => "Raita", 'description' => "Yogurt con cetrioli e spezie, perfetto per bilanciare i piatti piccanti", 'price' => 4.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 19: Viaggi nel Gusto
            ['restaurant_id' => 19, 'name' => "Paella Valenciana", 'description' => "Riso con pollo, coniglio, verdure e zafferano", 'price' => 20.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 19, 'name' => "Tacos al Pastor", 'description' => "Tacos con carne di maiale marinata e ananas", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 19, 'name' => "Pad Thai", 'description' => "Noodles di riso saltati con gamberi, tofu, arachidi e germogli di soia", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 20: La Locanda del Gatto Rosso
            ['restaurant_id' => 20, 'name' => "Risotto ai Porcini", 'description' => "Risotto cremoso con funghi porcini freschi", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 20, 'name' => "Ossobuco", 'description' => "Stinco di vitello con gremolada, servito con risotto allo zafferano", 'price' => 24.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 20, 'name' => "Tiramisù", 'description' => "Classico dessert italiano con savoiardi, caffè e crema al mascarpone", 'price' => 7.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 21: Ristorante Qui Si Mangia
            ['restaurant_id' => 21, 'name' => "Lasagne Bolognese", 'description' => "Strati di pasta all'uovo con ragù di carne e besciamella", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 21, 'name' => "Gnocchi Gorgonzola", 'description' => "Gnocchi di patate in crema di gorgonzola e noci", 'price' => 13.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 21, 'name' => "Scaloppine Limone", 'description' => "Fettine di vitello in salsa al limone", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 22: Trattoria de la Trebia Milano
            ['restaurant_id' => 22, 'name' => "Cassoeula", 'description' => "Piatto tipico milanese con verze e carne di maiale", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 22, 'name' => "Risotto al Salto", 'description' => "Risotto allo zafferano croccante", 'price' => 15.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 22, 'name' => "Mondeghili", 'description' => "Polpette fritte tipiche milanesi", 'price' => 10.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 23: Primè
            ['restaurant_id' => 23, 'name' => "Tartare di Manzo", 'description' => "Carne cruda di manzo condita con capperi, acciughe e tuorlo d'uovo", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 23, 'name' => "Spaghetti Vongole", 'description' => "Spaghetti con vongole fresche, aglio e prezzemolo", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 23, 'name' => "Branzino al Sale", 'description' => "Branzino intero cotto al forno sotto sale marino", 'price' => 25.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 24: Gloria Osteria
            ['restaurant_id' => 24, 'name' => "Pappardelle Cinghiale", 'description' => "Pappardelle fatte in casa con ragù di cinghiale", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 24, 'name' => "Tagliata di Manzo", 'description' => "Controfiletto di manzo alla griglia con rucola e scaglie di parmigiano", 'price' => 22.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 24, 'name' => "Panna Cotta", 'description' => "Dolce cremoso con coulis di frutti di bosco", 'price' => 7.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 25: Piz
            ['restaurant_id' => 25, 'name' => "4 Formaggi", 'description' => "Pizza con mozzarella, gorgonzola, parmigiano e fontina", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 25, 'name' => "Diavola", 'description' => "Pizza piccante con salame piccante e peperoncino", 'price' => 11.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 25, 'name' => "Calzone", 'description' => "Calzone farcito con prosciutto, funghi e mozzarella", 'price' => 13.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 26: Pizza Am
            ['restaurant_id' => 26, 'name' => "Bufala e Crudo", 'description' => "Pizza con mozzarella di bufala e prosciutto crudo", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 26, 'name' => "Vegetariana", 'description' => "Pizza con verdure grigliate miste", 'price' => 11.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 26, 'name' => "Focaccia Rosmarino", 'description' => "Focaccia sottile con olio d'oliva e rosmarino", 'price' => 6.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 27: Assaje
            ['restaurant_id' => 27, 'name' => "Pizza Fritta", 'description' => "Pizza fritta ripiena di ricotta e salame", 'price' => 10.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 27, 'name' => "Spaghetti Vongole", 'description' => "Spaghetti con vongole fresche e prezzemolo", 'price' => 15.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 27, 'name' => "Parmigiana", 'description' => "Melanzane gratinate con pomodoro, mozzarella e parmigiano", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 28: Pizzium
            ['restaurant_id' => 28, 'name' => "Pizza Napoli", 'description' => "Pizza con acciughe, capperi e olive", 'price' => 11.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 28, 'name' => "Porcini e Tartufo", 'description' => "Pizza con funghi porcini e tartufo nero", 'price' => 16.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 28, 'name' => "Margherita DOP", 'description' => "Pizza con pomodoro San Marzano e mozzarella di bufala DOP", 'price' => 10.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 29: Osaka
            ['restaurant_id' => 29, 'name' => "Sushi Misto", 'description' => "Assortimento di nigiri e maki del giorno", 'price' => 22.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 29, 'name' => "Tempura Moriawase", 'description' => "Frittura mista di gamberi e verdure in pastella leggera", 'price' => 18.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 29, 'name' => "Ramen Tonkotsu", 'description' => "Zuppa di noodles con brodo di maiale, uovo sodo e nori", 'price' => 14.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],

            // Restaurant 30: Poporoya
            ['restaurant_id' => 30, 'name' => "Chirashi Deluxe", 'description' => "Ciotola di riso con sashimi misto di alta qualità", 'price' => 25.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 30, 'name' => "Uramaki California", 'description' => "Roll di sushi con avocado, granchio e cetriolo", 'price' => 12.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
            ['restaurant_id' => 30, 'name' => "Gyoza", 'description' => "Ravioli giapponesi alla piastra ripieni di carne e verdure", 'price' => 8.00, 'path_img' => 'dishes/risotto-allo-zafferano.jpg'],
        ];

        foreach ($dishes as $dish) {
            $this->createDish($dish);
        }
    }

    private function createDish($data)
    {
        $dish = new Dish();
        $dish->restaurant_id = $data['restaurant_id'];
        $dish->name = Str::limit($data['name'], 20, '');
        $dish->description = $data['description'];
        $dish->price = number_format($data['price'], 2, '.', '');
        $dish->visibility = true;
        $dish->slug = Str::limit(Str::slug($data['name']), 30, '');
        $dish->path_img = $data['path_img'];
        $dish->save();
    }
}
