<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DesaController;
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
    Route::group(['prefix' => 'datamaster'], function () {
        Route::resource('kecamatan', KecamatanController::class, ['names' => 'dashboard.datamaster.kecamatan']);
        Route::resource('desa', DesaController::class, ['names' => 'dashboard.datamaster.desa']);
    });
});
