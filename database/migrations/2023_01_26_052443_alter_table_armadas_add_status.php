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
        Schema::table('armadas', function (Blueprint $table) {
            $table->enum('status', ['Tersedia', 'Servis', 'Rusak', 'Disewa'])->default('Tersedia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('armadas', function (Blueprint $table) {
            //
        });
    }
};
