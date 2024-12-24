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
        Schema::create('recete_ilaclari', function (Blueprint $table) {
            $table->id('recete_ilac_id');

            $table->unsignedBigInteger('recete_id');
            $table->foreign('recete_id')->references('recete_id')->on('receteler')->onDelete('cascade');

            $table->unsignedBigInteger('ilac_id');
            $table->foreign('ilac_id')->references('ilac_id')->on('ilaclar')->onDelete('cascade');

            $table->integer('adet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recete_ilaclari');
    }
};
