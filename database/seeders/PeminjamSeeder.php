<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Peminjam;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peminjam = Peminjam::create([
            'nama' => "Dani Setya",
            'alamat'  => "Salatiga - Jawa Tengah",
            'telephone' => "08134",
        ]);

        $peminjam = Peminjam::create([
            'nama' => "Ryan Pratama",
            'alamat'  => "Semarang - Jawa Tengah",
            'telephone' => "08383",
        ]);

        $peminjam = Peminjam::create([
            'nama' => "Brandon Jawato",
            'alamat'  => "Gianyar - Bali",
            'telephone' => "08823",
        ]);

        $peminjam = Peminjam::create([
            'nama' => "Susi Susanti",
            'alamat'  => "Jakarta Pusat - DKI Jakarta",
            'telephone' => "08754",
        ]);
    }
}
