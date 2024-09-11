<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disabilito chiavi nel caso ci sono
        Schema::disableForeignKeyConstraints();
        //svuoto tabella
        Type::truncate();

        $types = ['Italiano', 'Cinese', 'Indiano', 'Giapponese', 'Messicano', 'Vegetariano', 'Fast Food', 'Pizzeria'];
        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
