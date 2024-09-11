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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();

            // Colonna di relazione con la tabella restaurants
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade'); // Collega il piatto al ristorante

            $table->string('name', 20);
            $table->text('description')->nullable();;
            $table->decimal('price', 5, 2);
            $table->boolean('visibility');
            $table->string('slug', 30);
            $table->string('path_img', 255)->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
