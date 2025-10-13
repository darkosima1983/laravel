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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // naziv proizvoda
            $table->text('description')->nullable(); // opis
            $table->integer('amount')->default(0); // količina
            $table->decimal('price', 8, 2); // cena, npr. 9999.99
            $table->string('image')->nullable(); // putanja do slike
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
