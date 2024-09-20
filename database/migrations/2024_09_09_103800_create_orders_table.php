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

            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->string('status_order', 20);
            $table->string('status_payment', 20);
            $table->string('customer_name', 30);
            $table->string('customer_email', 50);
            $table->string('customer_address', 30);
            $table->decimal('total', 8, 2);

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


// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
