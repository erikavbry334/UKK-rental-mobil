<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $guarded = ['id'];

    public function detail_pakets() {
        return $this->hasMany(DetailPaket::class);
    }
}
