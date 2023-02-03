<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Paket;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Denda;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index (Request $request) {
        $jumlah_armada = Armada::count();
        $jumlah_pesanan = Pesanan::count();
        $jumlah_paket = Paket::count();
        $jumlah_denda = Denda::count();
        $title = 'Dashboard';

        $per = $request->per ? $request->per : 10;

        $pesanans = Pesanan::paginate($per);
        $pesanans = $pesanans->map(function ($p) {
            $is_denda = false;
            if (Carbon::parse($p->tgl_akhir)->isPast() && ($p->status == 3 || $p->status == 4)) {
                $is_denda = true;
            }
            $p->is_denda = $is_denda;
            return $p;
        });

        $users = User::paginate($per);
        return view('dashboard.index', compact('jumlah_armada', 'jumlah_paket', 'jumlah_pesanan', 'title','pesanans', 'users','jumlah_denda'));
    }

    public function profile() {
        return view('dashboard.profile.index');
    }

    public function profilePost(Request $request) {
      $data = $request->validate([
        "name" => "required",
        "email" => "required|email",
        "avatar" => "image"
    ]);
    
    if ($request->file('avatar')) {
      if (is_file(storage_path('app/'.str_replace('storage', 'public', auth()->user()->avatar)))) {
        unlink(storage_path('app/'.str_replace('storage', 'public', auth()->user()->avatar)));
      }

      $data['avatar'] = 'storage/' . $request->file('avatar')->store('avatar', 'public');
    }
        
    User::where("id", auth()->user()->id)->update($data);
    
    return redirect("/dashboard/profile")->with(['success' => 'Berhasil memperbarui profile']);
  }
}
