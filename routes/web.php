<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\DetailPaketController;
use App\Http\Controllers\ArmadaController;
use App\Http\Controllers\SyaratKetentuanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;



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
Route::post('/checkout', [PageController::class, 'checkout']);

Route::get('/about', function () {
    return view('userpage.about');
});

Route::get('/deals', function () {
    return view('userpage.deals');
});

Route::get('/reservation', function () {
    return view('userpage.reservation');
});

Route::get('/profile', function () {
    return view('userpage.profile');
})->middleware('auth');
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
    Route::resource('paket', PaketController::class);
    Route::prefix('paket/{paket_id}')->group(function () {
        Route::resource('dtpaket', DetailPaketController::class);
    });
    Route::resource('armada', ArmadaController::class);
    Route::resource('syarat-ketentuan', SyaratKetentuanController::class);
});