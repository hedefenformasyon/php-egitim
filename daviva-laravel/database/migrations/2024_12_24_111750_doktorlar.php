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
        Schema::create('doktorlar', function (Blueprint $table) {
            $table->id('dr_id');
            $table->string('ad');
            $table->string('soyad');
            $table->string('title')->nullable();

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
        Schema::dropIfExists('doktorlar');
    }
};
