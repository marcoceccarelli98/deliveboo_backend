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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Colonna di relazione con la tabella restaurants
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade'); // Collega l'ordine al ristorante

            $table->decimal('total', 5, 2);
            $table->string('status_order', 20);
            $table->string('status_payment', 20);
            $table->string('customer_name', 20);
            $table->string('customer_address', 20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
