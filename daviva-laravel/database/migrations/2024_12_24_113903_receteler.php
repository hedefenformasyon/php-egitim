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
        Schema::create('receteler', function (Blueprint $table) {
            $table->id('recete_id');
            $table->string('no');
            $table->integer('tur');
            $table->date('tarih');

            $table->unsignedBigInteger('doktor_id');
            $table->foreign('doktor_id')->references('dr_id')->on('doktorlar')->onDelete('cascade');

            $table->unsignedBigInteger('klinik_id');
            $table->foreign('klinik_id')->references('klinik_id')->on('klinikler')->onDelete('cascade');

            $table->unsignedBigInteger('hasta_id');
            $table->foreign('hasta_id')->references('hasta_id')->on('hastalar')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receteler');
    }
};
