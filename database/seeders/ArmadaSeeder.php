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
            'no_plat' => 'L 2412 XL',
            'harga' => 200000,
            'gambar' => 'storage/armada/DAoxekNj9GysCJ0kPK8obeEiFNMuAgsbxMzArO5q.jpg',
        ]);
    }
}
