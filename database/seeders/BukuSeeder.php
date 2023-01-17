<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku = Buku::create([
            'judul' => "Kamus Bahasa Inggris",
            'pengarang'  => "John M. Echols & Hassan Shadily",
            'penerbit' => "Gramedia",
            'photo' => "108_buku kamus.jpg",
        ]);

        $buku = Buku::create([
            'judul' => "Bobo",
            'pengarang'  => "Ananda Kusnadi",
            'penerbit' => "Gramedia",
            'photo' => "buku bobo.jpg",
        ]);

        $buku = Buku::create([
            'judul' => "Koala Kumal",
            'pengarang'  => "Raditya Dika",
            'penerbit' => "Gramedia",
            'photo' => "558_buku koala kumal.jpg",
        ]);


        $buku = Buku::create([
            'judul' => "Si Juki",
            'pengarang'  => "Faza Meonk",
            'penerbit' => "Elex Media Komputindo",
            'photo' => "174_si juki.jpg",
        ]);
    }
}
