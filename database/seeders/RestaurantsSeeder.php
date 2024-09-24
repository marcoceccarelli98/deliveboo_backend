<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            ['user_id' => 1, 'companyName' => "La Dolce Vita", 'address' => "Via Roma, 25", 'pIva' => "12345678901", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 2, 'companyName' => "Bella Napoli", 'address' => "Corso Garibaldi, 98", 'pIva' => "98765432102", 'city' => "Napoli", 'path_img' => '/restaurants/bella-napoli.png'],
            ['user_id' => 3, 'companyName' => "Osteria del Chianti", 'address' => "Piazza San Marco, 12", 'pIva' => "23456789012", 'city' => "Firenze", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 4, 'companyName' => "Mare e Monti", 'address' => "Via del Mare, 45", 'pIva' => "34567890123", 'city' => "Genova", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 5, 'companyName' => "Al Vecchio Mulino", 'address' => "Via delle Rose, 7", 'pIva' => "45678901234", 'city' => "Roma", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 6, 'companyName' => "Sushi Shangai", 'address' => "Piazza Navona, 17", 'pIva' => "56789012345", 'city' => "Roma", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 7, 'companyName' => "Sushi Kisaragi", 'address' => "Piazza Marini, 127", 'pIva' => "67890123456", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 8, 'companyName' => "Sushi Tsunami", 'address' => "Piazza Cusano, 52", 'pIva' => "78901234567", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 9, 'companyName' => "Jin Yong", 'address' => "Via Gustavo Fara, 15", 'pIva' => "89012345678", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 10, 'companyName' => "Ristorante Mao", 'address' => "Via Porpora, 23", 'pIva' => "90123456789", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 11, 'companyName' => "Ji Li Ravioleria", 'address' => "Viale Sabotino, 13", 'pIva' => "01234567890", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 12, 'companyName' => "Jamm Ja", 'address' => "Via Carlo Freguglia, 2", 'pIva' => "12345678909", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 13, 'companyName' => "Osteria da Zio Ninì", 'address' => "Via Tibullo, 10", 'pIva' => "23456789098", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 14, 'companyName' => "Girarrosti S. Rita", 'address' => "Viale Coni Zugna, 43", 'pIva' => "34567890987", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 15, 'companyName' => "Ristorante Shiva", 'address' => "Viale Gian Galeazzo, 7", 'pIva' => "45678909876", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 16, 'companyName' => "Tara Ristorante", 'address' => "Via Domenico Cirillo, 16", 'pIva' => "56789098765", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 17, 'companyName' => "Just India", 'address' => "Via Benedetto Marcello, 34", 'pIva' => "67890987654", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 18, 'companyName' => "Indian Restaurant", 'address' => "Via Errico Petrella, 19", 'pIva' => "78909876543", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 19, 'companyName' => "Viaggi nel Gusto", 'address' => "Via Edmondo de Amicis, 24", 'pIva' => "89098765432", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 20, 'companyName' => "Locanda Gatto Rosso", 'address' => "Via Ugo Foscolo, 3", 'pIva' => "90987654321", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 21, 'companyName' => "Qui Si Mangia", 'address' => "Via Gerolamo Cardano, 2", 'pIva' => "09876543210", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 22, 'companyName' => "Trattoria Trebia", 'address' => "Via Trebbia, 32", 'pIva' => "98765432109", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 23, 'companyName' => "Primè", 'address' => "Viale Francesco Crispi, 2", 'pIva' => "87654321098", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 24, 'companyName' => "Gloria Osteria", 'address' => "Via Tivoli, 3", 'pIva' => "76543210987", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 25, 'companyName' => "Piz", 'address' => "Via Torino, 34", 'pIva' => "65432109876", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 26, 'companyName' => "Pizza Am", 'address' => "Corso di Porta Romana, 83", 'pIva' => "54321098765", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 27, 'companyName' => "Assaje", 'address' => "Via Traù, 2", 'pIva' => "43210987654", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 28, 'companyName' => "Pizzium", 'address' => "Via G. C. Procaccini, 30", 'pIva' => "32109876543", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 29, 'companyName' => "Osaka", 'address' => "Corso Garibaldi, 68", 'pIva' => "21098765432", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
            ['user_id' => 30, 'companyName' => "Poporoya", 'address' => "Via B. Eustachi, 17", 'pIva' => "10987654321", 'city' => "Milano", 'path_img' => '/restaurants/la-dolce-vita.jpeg'],
        ];

        foreach ($restaurants as $index => $restaurant) {
            $this->createRestaurant($index + 1, $restaurant);
        }
    }

    private function createRestaurant($id, $data)
    {
        $restaurant = new Restaurant();
        $restaurant->id = $id;
        $restaurant->user_id = $data['user_id'];
        $restaurant->companyName = Str::limit($data['companyName'], 20, '');
        $restaurant->address = Str::limit($data['address'], 30, '');
        $restaurant->pIva = $data['pIva'];
        $restaurant->city = Str::limit($data['city'], 20, '');
        $restaurant->slug = Str::limit(Str::slug($data['companyName']), 30, '');
        $restaurant->path_img = $data['path_img'];
        $restaurant->save();
    }
}
