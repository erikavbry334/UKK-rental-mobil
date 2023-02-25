<?php

namespace Database\Seeders;

use App\Models\Armada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArmadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Armada::create([
            'nama_armada' => 'Avanza',
            'no_plat' => 'L 1980 XL',
            'harga' => 250000,
            'gambar' => 'storage/armada/avanza.jpg',
        ]);
        Armada::create([
            'nama_armada' => 'Xenia',
            'no_plat' => 'L 572 PO',
            'harga' => 300000,
            'gambar' => 'storage/armada/xenia.jpg',
        ]);
        // Armada::create([
        //     'nama_armada' => 'Fortuner',
        //     'no_plat' => 'L 873 ME',
        //     'harga' => 450000,
        //     'gambar' => 'storage/armada/fortuner.jpg',
        // ]);
    }
}
