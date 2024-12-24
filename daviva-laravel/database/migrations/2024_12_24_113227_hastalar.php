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
        Schema::create('hastalar', function (Blueprint $table) {
            $table->id('hasta_id');
            $table->string('ad');
            $table->string('soyad');

            $table->tinyInteger('cinsiyet')->comment('Erkek=1 Kadın=2');
            $table->date('dogum_tarihi');

            $table->unsignedBigInteger('klinik_id');
            $table->foreign('klinik_id')->references('klinik_id')->on('klinikler')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hastalar');
    }
};
