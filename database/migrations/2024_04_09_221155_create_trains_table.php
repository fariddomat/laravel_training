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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('muscle_id');
            $table->unsignedBigInteger('category_id');
            $table->string('level');
            $table->string('title');
            $table->text('description');
            $table->string('goal');
            $table->json('days_of_week');
            $table->timestamps();

            $table->foreign('muscle_id')->references('id')->on('muscles')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
