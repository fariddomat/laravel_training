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
        Schema::create('train_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('train_id');
            $table->string('media_path');
            $table->timestamps();

            $table->foreign('train_id')->references('id')->on('trains')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('train_media');
    }
};
