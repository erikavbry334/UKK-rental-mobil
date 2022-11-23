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
            $table->date('tgl_pesan');
            $table->integer('lama_sewa')->default(0);
            $table->integer('jumlah_unit');
            $table->string('total_harga');
            $table->foreignId('paket_id')->constrained('pakets')->restrictOnDelete();
            $table->foreignId('armada_id')->constrained('armadas')->restrictOnDelete();
            $table->enum('status', [1,2,3,4,5])->default(1);
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
