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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Menyimpan siapa yang menambahkan film
            $table->string('nama', 255);
            $table->string('gambar', 255);
            $table->text('trailer'); // URL biasanya panjang, jadi pakai text
            $table->text('deskripsi');
            $table->string('tahun_id'); // Menggunakan tipe `year`
            $table->string('negara_id', 100);
            $table->tinyInteger('rating')->unsigned()->default(0);
            $table->integer('durasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
