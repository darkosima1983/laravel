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
        //Schema -> vasa baza
        //Create -> schema::create->CREATE TABLE
        //function (Blueprint $table)-> ovo je kod koji se izvrasava, $table -> vasa "contact" tabela u bazi
        Schema::create('contact', function (Blueprint $table) {
            $table->id(); // UNSIGNED (ne moze biti negativan broj), big increment (BIG INT, AUTO INCREMENT)

            $table->string("email", 64); // varchar (64) EMAIL
            $table->string("subject"); // varchar default(192) subject
            $table->text("message");// TEXT message

            $table->timestamps(); // created_at, updated_at -> trenutno vreme, vreme azuriranja
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
