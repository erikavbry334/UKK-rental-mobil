<?php

namespace Database\Seeders;

use App\Models\DetailPaket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailPaket::create([
            'nama' => 'Bensin Full',
            'paket_id' => 1
        ]);
        DetailPaket::create([
            'nama' => 'Ban Serep',
            'paket_id' => 1
        ]);
        DetailPaket::create([
            'nama' => 'Snack & Minuman (1 Porsi)',
            'paket_id' => 1
        ]);
        DetailPaket::create([
            'nama' => 'Bensin Full',
            'paket_id' => 2
        ]);
        DetailPaket::create([
            'nama' => 'Ban Serep',
            'paket_id' => 2
        ]);
        DetailPaket::create([
            'nama' => 'Saldo E-Toll (50K)',
            'paket_id' => 2
        ]);
        DetailPaket::create([
            'nama' => 'Snack & Minuman (2 Porsi)',
            'paket_id' => 2
        ]);
        // DetailPaket::create([
        //     'nama' => 'Bensin Full',
        //     'paket_id' => 3
        // ]);
        // DetailPaket::create([
        //     'nama' => 'Ban Serep',
        //     'paket_id' => 3
        // ]);
        // DetailPaket::create([
        //     'nama' => 'Saldo E-Toll (100K)',
        //     'paket_id' => 3
        // ]);
        // DetailPaket::create([
        //     'nama' => 'Supir (Sudah termasuk Makan)',
        //     'paket_id' => 3
        // ]);
        // DetailPaket::create([
        //     'nama' => 'Snack & Minuman (4 Porsi)',
        //     'paket_id' => 3
        // ]);
    }
}
