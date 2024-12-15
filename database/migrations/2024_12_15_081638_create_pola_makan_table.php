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
        Schema::create('pola_makan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('activity_id');
            $table->string('Nama Makanan');
            $table->integer('Total');
            $table->integer('Calories'); 

            $table->foreign('activity_id')->references('id')->on('aktivitas_harian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pola_makan');
    }
};
