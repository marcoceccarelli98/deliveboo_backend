<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('restaurant_type', function (Blueprint $table) {

            $table->id();

            // Definisci la colonna restaurant_id 
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');

            // Definisci la colonna type_id
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurant_type');
    }
};
