<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Dashboard\DptController;
use App\Http\Controllers\Dashboard\TpsController;
use App\Http\Controllers\Dashboard\DesaController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\PesertaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\KecamatanController;
use App\Http\Controllers\Dashboard\KordinatorDesaController;
use App\Http\Controllers\Dashboard\KordinatorKecamatanController;

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

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});


Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','isAdmin']], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');
    Route::resource('peserta', PesertaController::class, ['names' => 'dashboard.peserta']);
    Route::resource('kordinator/kecamatan', KordinatorKecamatanController::class, ['names' => 'dashboard.kordinator.kecamatan']);
    Route::resource('kordinator/desa', KordinatorDesaController::class, ['names' => 'dashboard.kordinator.desa']);
    Route::resource('dpt', DptController::class, ['names' => 'dashboard.dpt']);
    Route::resource('user', UserController::class, ['names' => 'dashboard.user']);

    Route::group(['prefix' => 'datamaster'], function () {
        Route::resource('tps', TpsController::class, ['names' => 'dashboard.datamaster.tps']);
        Route::resource('desa', DesaController::class, ['names' => 'dashboard.datamaster.desa']);
        Route::resource('kecamatan', KecamatanController::class, ['names' => 'dashboard.datamaster.kecamatan']);
    });

    //data
    Route::get('data', [DataController::class, 'index'])->name('dashboard.data.index');
    Route::get('data/desa/{name}', [DataController::class, 'desa'])->name('dashboard.data.kecamatan.desa');
    Route::get('data/tps/{name}', [DataController::class, 'tps'])->name('dashboard.data.kecamatan.desa.tps');
    // get data from database
    Route::post('get/desa', [PesertaController::class, 'getdesa'])->name('get.desa');
    Route::post('get/tps', [PesertaController::class, 'gettps'])->name('get.tps');
    //get Nik
    Route::post('get/nik', [PesertaController::class, 'getnik'])->name('get.nik');


    //export peserta
    // Route::get('peserta/page/excel', [PesertaController::class, 'export_page'])->name('dashboard.peserta.data.view');
    Route::get('peserta/export/excel', [PesertaController::class, 'export_excel'])->name('dashboard.peserta.data.export.excel');
    Route::get('peserta/export/pdf', [PesertaController::class, 'generate_pdf'])->name('dashboard.peserta.data.export.pdf');

});


