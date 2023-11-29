<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DropPointController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PenukaranPoinController;
use App\Http\Controllers\PenukaranSampahController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TenanController;
use App\Models\JenisSampah;
use App\Models\PenukaranPoin;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'dashboard/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [HomeController::class, 'profile'])->name('profile');
        Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
    });

    Route::resource('users', AkunController::class);
    Route::post('/users-list', [AkunController::class, 'getUsersData'])->name('users-list');

    Route::resource('barang', BarangController::class);
    Route::post('/barang-list', [BarangController::class, 'getBarang'])->name('barang-list');

    Route::resource('tenan', TenanController::class);
    Route::post('/tenan-list', [TenanController::class, 'getTenan'])->name('tenan-list');


    Route::resource('kasir', KasirController::class);
    Route::post('/kasir', [KasirController::class, 'getKasir'])->name('kasir-list');

});
