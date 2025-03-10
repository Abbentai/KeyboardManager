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
            $table->id();
            $table->string('name');
            $table->decimal('actuation_force', 8, 2);
            $table->decimal('travel_distance', 8, 2);
            $table->string('type');
            $table->boolean('prelubed');
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->foreignId('store_id')->constrained()->onDelete('cascade');
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
