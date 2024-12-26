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
        Schema::create('indikator_kesehatan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->integer('height')->nullable(); // Tinggi badan (cm)
            $table->float('weight')->nullable(); // Berat badan (kg)
            $table->time('sleep_time')->nullable(); // Waktu tidur
            $table->time('wake_time')->nullable(); // Waktu bangun
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indikator_kesehatan');
    }
};
