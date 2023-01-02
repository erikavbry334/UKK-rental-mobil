<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $jumlah_armada = Armada::count();
        $jumlah_user = User::count();
        $jumlah_pesanan = Pesanan::count();
        $title = 'Dashboard';
        return view('dashboard.index', compact('jumlah_armada', 'jumlah_user', 'jumlah_pesanan', 'title'));
    }
}
