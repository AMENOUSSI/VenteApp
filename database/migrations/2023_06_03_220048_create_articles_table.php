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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('fichier_pdf');
            $table->unsignedBigInteger('auteur_id');
            $table->unsignedBigInteger('confrernce_id');
            $table->timestamps();

            $table->foreign('auteur_id')->references('id')->on('auteurs')->onDelete('cascade');
            $table->foreign('confrernce_id')->references('id')->on('conferences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
