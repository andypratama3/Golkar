<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Peserta;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $pesertas = Peserta::select(['name'])->get();


        $kecamatan = Kecamatan::select(['name'])->get();

        // $peserta = Peserta::Countwith('peserta_kecamatans')->where('kecamatan_id', $kecamatan-)
        return view('dashboard.index', compact('pesertas'));
    }
}
