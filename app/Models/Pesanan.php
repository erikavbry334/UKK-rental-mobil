<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnableToBuildUuidException;

class Pesanan extends Model
{
    protected $guarded = ['id'];
    protected $appends = ['status_text'];

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class);
    }
    public function denda() {
        return $this->hasOne(Denda::class);
    }
    public function pengembalian() {
        return $this->hasOne(pengembalian::class);
    }

    public function armada() {
        return $this->belongsTo(Armada::class);
    }
    public function paket() {
        return $this->belongsTo(Paket::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            try {
                $model->uuid = Uuid::uuid4()->toString();
            } catch (UnableToBuildUuidException $e) {
                abort(500, $e->getMessage());
            }
        });
    }

    public function getStatusTextAttribute() {
        if ($this->status == 1) {
            return 'Menunggu Pembayaran';
        } else if ($this->status == 2) {
            return 'sudah dibayar';
        } else if ($this->status == 3) {
            return 'sedang disewa';
        } else if ($this->status == 4) {
            return 'telah dikembalikan';
        } else if ($this->status == 5) {
            return 'selesai';
        }else if ($this->status == 6) {
            return 'dibatalkan';
        }
    }
}
