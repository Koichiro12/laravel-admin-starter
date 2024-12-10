<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Lainnya\LaporanController;
use App\Http\Controllers\Dashboard\Lainnya\UsersController;
use App\Http\Controllers\Dashboard\Master\FasilitasController;
use App\Http\Controllers\Dashboard\Master\KamarController;
use App\Http\Controllers\Dashboard\Master\PenyewaController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\Transaksi\PembayaranController;
use App\Http\Controllers\Dashboard\Transaksi\PenyewaanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'prevent-back']], function () {
    //Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    //User
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('updateProfile');
    //Lainnya //Users
    Route::resource('pengguna',UsersController::class);
});
