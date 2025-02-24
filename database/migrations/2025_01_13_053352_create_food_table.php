<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the animal food
            $table->string('type'); // Type/category (e.g., dry, wet, raw, treats)
            $table->string('animal_type'); // Type of animal (e.g., dog, cat, bird, fish)
            $table->decimal('weight', 10, 2)->nullable(); // Weight of the food package (e.g., in kilograms or pounds)
            $table->decimal('price', 10, 2); // Price of the food
            $table->timestamp('Created_at')->useCurrent();
            $table->timestamp('Updated_at')->useCurrent()->UseCurrentOnUpdate();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
};
