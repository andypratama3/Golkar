<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Peserta;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        // $pendukungs = Peserta::all();

        // $kuning = 'Kuning';
        // $total = $pendukungs->where('warna')->count();
        // foreach ($pendukungs as $pendukung) {
        //     foreach ($pendukung->kecamatans_peserta as $kecamatan) {
        //         foreach ($pendukung->desa_pesertas as $desa) {
        //             foreach ($pendukung->tps_pesertas as $item) {

        //             }
        //         }
        //     }
        // }
        $kecamatans = Kecamatan::select(['name'])->get();
        foreach ($kecamatans as $kecamatan){

        }
        return view('dashboard.index',compact('kecamatan'));
    }


}
