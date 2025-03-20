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
        Schema::create('film_aktor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('aktor_id');
            $table->timestamps();
        
            // Foreign keys
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
            $table->foreign('aktor_id')->references('id')->on('aktor')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_aktor');
    }
};
