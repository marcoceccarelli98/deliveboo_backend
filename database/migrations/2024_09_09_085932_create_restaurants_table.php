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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Assicura che sia una foreign key

            $table->string('companyName', 20)->unique();
            $table->string('address', 30);
            $table->char('pIva', 11)->unique();
            $table->string('city', 20)->nullable();
            $table->string('path_img', 255)->nullable();
            $table->string('slug', 30);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
