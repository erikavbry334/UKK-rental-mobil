<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paket::create([
            'nama_paket' => 'Paket Regular',
            'harga' => 200000,
            'gambar' => 'storage/paket/paket-regular.png'
        ]);
        Paket::create([
            'nama_paket' => 'Paket Premium',
            'harga' => 350000,
            'gambar' => 'storage/paket/paket-premium.png'
        ]);
        // Paket::create([
        //     'nama_paket' => 'Paket Deluxe',
        //     'harga' => 450000,
        //     'gambar' => 'storage/paket/paket-deluxe.png'
        // ]);
    }
}
