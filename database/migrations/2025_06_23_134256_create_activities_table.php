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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('trainer_id')->constrained('users','id')->onDelete('cascade');
            $table->foreignId('gym_room_id')->constrained('gym_rooms','id')->onDelete('cascade');
            $table->foreignId('activity_type_id')->constrained('activity_types','id')->onDelete('cascade');
            $table->unsignedTinyInteger('capacity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
