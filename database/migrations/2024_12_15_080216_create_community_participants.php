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
        Schema::create('community_participants', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('community_id'); // FK ke communities
        $table->unsignedBigInteger('user_id'); // FK ke users
        $table->enum('role', ['admin', 'member'])->default('member');
        $table->timestamp('joined_at')->nullable();
        $table->timestamps();

        $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->unique(['community_id', 'user_id']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantcommunity');
    }
};
