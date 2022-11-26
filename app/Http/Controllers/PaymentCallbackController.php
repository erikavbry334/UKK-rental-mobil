<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService();

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Pembayaran::where('pesanan_id', $order->id)->update([
                    'status' => 2,
                ]);
                Pesanan::where('id', $order->id)->update(['status' => '2']);
            }

            if ($callback->isExpire()) {
                Pembayaran::where('pesanan_id', $order->id)->update([
                    'status' => 3,
                ]);
                Pesanan::where('id', $order->id)->update(['status' => '5']);
            }

            if ($callback->isCancelled()) {
                Pembayaran::where('pesanan_id', $order->id)->update([
                    'status' => 3,
                ]);
                Pesanan::where('id', $order->id)->update(['status' => '5']);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}