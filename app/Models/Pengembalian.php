<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    protected $guarded = ['id'];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class);
    }
    public function denda() {
        return $this->belongsTo(Denda::class);
    }
}
