<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $pesanan;

    public function __construct($pesanan)
    {
        parent::__construct();

        $this->pesanan = $pesanan;
    }

    public function getSnapToken()
    {
        $params = [
            'transaction_details' => [
                'order_id' => $this->pesanan->uuid,
                'gross_amount' => $this->pesanan->total_harga,
            ],
            'item_details' => [
                [
                    'id' => $this->pesanan->armada->id,
                    'price' => $this->pesanan->armada->harga,
                    'quantity' => $this->pesanan->lama_sewa,
                    'name' => $this->pesanan->armada->nama_armada,
                ],
                [
                    'id' => $this->pesanan->paket->id,
                    'price' => $this->pesanan->paket->harga,
                    'quantity' => 1,
                    'name' => $this->pesanan->paket->nama_paket,
                ],
            ],
            'customer_details' => [
                'first_name' => $this->pesanan->nama_pemesan,
                'email' => auth()->user()->email,
                'phone' => $this->pesanan->no_hp,
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }
}