<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class FilmSeeder extends Seeder
{
    public function run()
    {
        $timestamp = Carbon::now();

        // Seeder untuk users
        DB::table('users')->insert([
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('11111111'), 'role' => 'admin', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['name' => 'User', 'email' => 'Apalah@gmail.com', 'password' => Hash::make('11111111'), 'role' => 'user', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['name' => 'Author', 'email' => 'author@gmail.com', 'password' => Hash::make('11111111'), 'role' => 'author', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);

        // Seeder untuk genre
        DB::table('genre')->insert([
            ['nama_genre' => 'Action', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_genre' => 'Drama', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_genre' => 'Comedy', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_genre' => 'Horror', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_genre' => 'Sci-Fi', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);

        // Seeder untuk aktor
        DB::table('aktor')->insert([
            ['nama_aktor' => 'Raffi Ahmad', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_aktor' => 'Christopher Nolan', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_aktor' => 'Rimuru Tempest', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);

        // Seeder untuk tahun
        DB::table('tahun')->insert([
            ['nama_tahun' => '2010', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_tahun' => '2019', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_tahun' => '2001', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_tahun' => '2011', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_tahun' => '2024', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);

        // Seeder untuk negara
        DB::table('negara')->insert([
            ['nama_negara' => 'USA', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_negara' => 'Japan', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_negara' => 'Korea', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_negara' => 'Indonesia', 'created_at' => $timestamp, 'updated_at' => $timestamp],
            ['nama_negara' => 'France', 'created_at' => $timestamp, 'updated_at' => $timestamp],
        ]);

        // Seeder untuk films
        $films = [
            [
                'author_id' => 1,
                'nama' => 'Inception',
                'gambar' => 'images/inception.jpg',
                'trailer' => 'https://youtu.be/8hP9D6kZseM?si=CEPySdHsrdIo2xAA',
                'deskripsi' => 'A mind-bending thriller by Christopher Nolan.',
                'tahun_id' => 1,
                'negara_id' => 1,
                'aktor' => [1, 2],
                'rating' => 9,
                'durasi' => 148,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'genre' => [1, 2], // ID genre yang akan dikaitkan
            ],
            [
                'author_id' => 1,
                'nama' => 'Parasite',
                'gambar' => 'images/parasite.jpg',
                'trailer' => 'https://youtu.be/SEUXfv87Wpk?si=w_yrxUKcQh5bFRzO',
                'deskripsi' => 'A dark comedy thriller from Bong Joon-ho.',
                'tahun_id' => 2,
                'negara_id' => 3,
                'aktor' => [1, 2],
                'rating' => 9,
                'durasi' => 132,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'genre' => [2, 3], // Tambahkan genre untuk Parasite
            ],
            [
            
                'author_id' => 1,
                'nama' => 'Avengers: Endgame',
                'gambar' => 'images/endgame.jpg',
                'trailer' => 'https://youtu.be/TcMBFSGVi1c?si=KfItqkXUwi-pP84Z',
                'deskripsi' => 'The epic conclusion to the Marvel Cinematic Universe saga.',
                'tahun_id' => 2,
                'negara_id' => 1,
                'aktor' => [1, 2],
                'rating' => 8,
                'durasi' => 181,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'genre' => [1, 5], // Tambahkan genre untuk Avengers
            ],
            [
                
                'author_id' => 1,
                'nama' => 'Spirited Away',
                'gambar' => 'images/Spirited_Away_Japanese_poster.png',
                'trailer' => 'https://youtu.be/ByXuk9QqQkk?si=vuibyBcFiOiKoDaW',
                'deskripsi' => 'A magical journey by Studio Ghibli.',
                'tahun_id' => 3,
                'negara_id' => 2,
                'aktor' => [1, 2],
                'rating' => 9,
                'durasi' => 125,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'genre' => [2, 3],
            ],
            [
                'author_id' => 1,
                'nama' => 'The Raid',
                'gambar' => 'images/the raid.jpg',
                'trailer' => 'https://youtu.be/m6Q7KnXpNOg?si=K3MJrInsLl6QQp15',
                'deskripsi' => 'An intense Indonesian action film.',
                'tahun_id' => 4,
                'negara_id' => 4,
                'aktor' => [1, 2],
                'rating' => 8,
                'durasi' => 101,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
                'genre' => [1, 4],

            ],
        ];

        foreach ($films as $film) {
            // Simpan data film tanpa genre & aktor
            $filmData = $film;
            unset($filmData['genre'], $filmData['aktor']); 

            $filmId = DB::table('films')->insertGetId($filmData);

            // Simpan data genre ke tabel pivot film_genre
            foreach ($film['genre'] as $genreId) {
                DB::table('film_genre')->insert([
                    'film_id' => $filmId,
                    'genre_id' => $genreId,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]);
            }

            // Simpan data aktor ke tabel pivot film_aktor
            foreach ($film['aktor'] as $aktorId) {
                DB::table('film_aktor')->insert([
                    'film_id' => $filmId,
                    'aktor_id' => $aktorId,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ]);
            }
        }
    }
}
