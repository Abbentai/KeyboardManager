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
        Schema::create('keyswitches', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->integer('actuation_force');
            $table->integer('travel_distance');
            $table->string('type');
            $table->boolean('prelubed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyswitches');
    }
};
