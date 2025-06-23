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
        Schema::create('gym_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gym_id')->constrained('gyms','id')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('room_types','id')->onDelete('cascade');
            $table->string('name');
            $table->unsignedTinyInteger('capacity');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_rooms');
    }
};
