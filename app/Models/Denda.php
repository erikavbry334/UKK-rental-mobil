<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    protected $guarded = ['id'];

    public function pesanan() {
        return $this->belongsTo(Pesanan::class);
    }
    public function pengembalian() {
        return $this->hasone(pengembalian::class);
    }
}
