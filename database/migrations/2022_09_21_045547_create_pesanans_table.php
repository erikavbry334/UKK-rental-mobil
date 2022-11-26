<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->date('tgl_pesan');
            $table->integer('lama_sewa')->default(0);
            $table->double('total_harga', 10, 2);
            $table->foreignId('paket_id')->constrained('pakets')->restrictOnDelete();
            $table->foreignId('armada_id')->constrained('armadas')->restrictOnDelete();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->enum('status', [1,2,3,4,5])->default(1)->comment('1: menunggu pembayaran, 2:sedang disewa, 3:telah dikembalikan, 4:selesai, 5:dibatalkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
};
