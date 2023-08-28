<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Dashboard\TpsController;
use App\Http\Controllers\Dashboard\DesaController;
use App\Http\Controllers\Dashboard\PesertaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KecamatanController;

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

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');
    Route::get('/data', [DataController::class, 'index'])->name('dashboard.data.index');
    Route::get('/data/{name}', [DataController::class, 'kecamatan'])->name('dashboard.data.kecamatan');
    Route::resource('peserta', PesertaController::class, ['names' => 'dashboar.peserta']);

    Route::group(['prefix' => 'datamaster'], function () {
        Route::resource('desa', DesaController::class, ['names' => 'dashboard.datamaster.desa']);
        Route::resource('tps', TpsController::class, ['names' => 'dashboard.datamaster.tps']);
        Route::resource('kecamatan', KecamatanController::class, ['names' => 'dashboard.datamaster.kecamatan']);
    });
});
