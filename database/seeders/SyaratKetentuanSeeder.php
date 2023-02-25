<?php

namespace Database\Seeders;

use App\Models\SyaratKetentuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyaratKetentuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SyaratKetentuan::create([
            'isi' => '<h2>Syarat:</h2><ol><li>Memiliki KTP beralamat Surabaya yang akan disimpan oleh pihak kami</li><li>Fotocopy SIM A calon penyewa/pengemudi</li><li>Fotocopy KK calon penyewa/pengemudi</li><li>Jaminan barang berharga (motor, BPKB, dan lain lain)</li><li>Bersedia untuk difoto di tempat kami sebelum mobil mulai disewa</li></ol><p>&nbsp;</p><h2>Ketentuan:</h2><ol><li>Adanya ketentuan denda sewa jika melebihi batas waktu sewa</li><li>Adanya aturan wilayah pemakaian kendaraan</li><li>Adanya aturan denda asuransi jjika terjadi kerusakan</li><li>Penyewaan yang telah dibayar tidak bisa dibatalkan</li><li>Kendaraan hanya dapat dikemudikan oleh orang yang memiliki SIM A</li><li>Penyewa bertanggungjawab atas fasilitas yang telah diberikan (Mobil, STNK, Kunci, dan lain lain)</li></ol><p>&nbsp;</p><h2>Penyewa Dilarang:</h2><ol><li>Menggadaikan kendaraan</li><li>Menyewakan kembali ke orang lain</li><li>Menjual kendaraan</li><li>Memindah tangankan sewa</li></ol>'
        ]);
    }
}
