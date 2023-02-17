<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\DetailPaketController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\SyaratKetentuanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\LaporanController;



// use 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/dashboard', function () {
//     return view('dashboard.layouts.main', [
//         'title' => 'Dashboard'
//     ]);
// });

Route::get('/', [PageController::class, 'home']);
Route::get('/catalog', [PageController::class, 'catalog']);
Route::get('/catalog/{id}', [PageController::class, 'catalogDetail']);
Route::post('/checkout', [PageController::class, 'checkout'])->middleware('auth');
Route::post('/checkout/charge', [PesananController::class, 'charge'])->middleware('auth');

Route::get('/about', function () {
    return view('userpage.about');
});

Route::get('/kontakkami', function () {
    return view('userpage.kontakkami');
});

Route::get("/syarat-ketentuan", [PageController::class, "SyaratKetentuan"]);

Route::get('/profile', [PageController::class, 'profile'])->middleware('auth');
Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->middleware('auth');
Route::get('/pesanan/{id}/batal', [PesananController::class, 'batal'])->middleware('auth');

Route::post('/user', [UserController::class, 'update'])->middleware('auth');
 
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'store']);



Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'level:admin']], function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/profile', [DashboardController::class, 'profile']);
    Route::post('/profile', [DashboardController::class, 'profilePost']);
    Route::resource('paket', PaketController::class);
    Route::prefix('paket/{paket_id}')->group(function () {
        Route::resource('dtpaket', DetailPaketController::class);
    });
    Route::resource('armada', ArmadaController::class);
    Route::resource('denda', DendaController::class);
    Route::get('denda/{id}/cetak', [DendaController::class, 'cetak']);
    Route::resource('syarat-ketentuan', SyaratKetentuanController::class);
    Route::resource('pesanan', PesananController::class)->except(['show']);
    Route::get('pesanan/{status?}', [PesananController::class, 'index']);
    Route::get('pesanan/{id}/detail', [PesananController::class, 'dashboardDetail']);
    Route::post('pesanan/{id}/update-status', [PesananController::class, 'updateStatus']);
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::post('laporan', [LaporanController::class, 'cetak']);
    Route::get('pesanan/{id}/cetak', [PesananController::class, 'cetak'])->name('cetak.pesanan');

});

Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);