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
        Schema::create('dishes_orders', function (Blueprint $table) {
            $table->id();

            // Definisci la colonna dish_id 
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');

            // Definisci la colonna order_id 
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            $table->unsignedTinyInteger('quantity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes_orders');
    }
};
