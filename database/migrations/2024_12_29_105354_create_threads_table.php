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
        Schema::create('threads', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('community_id'); // FK ke communities
        $table->string('title');
        $table->text('content');
        $table->unsignedBigInteger('created_by'); // FK ke users
        $table->timestamps();

        $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threads');
    }
};
