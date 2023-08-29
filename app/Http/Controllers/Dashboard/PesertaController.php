<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tps;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PesertaController extends Controller
{
    public function index()
    {
        return view('dashboard.peserta.index');
    }
    ///nik tidak boleh sama
    public function create()
    {
        $kecamatans = Kecamatan::select(['id','name','slug'])->get();
        $desas = Desa::select(['id','name','slug'])->get();
        $tpss = Tps::select(['id','name','slug'])->get();

        foreach ($kecamatans as $kecamatan){
            
        }
        return view('dashboard.peserta.create', compact('kecamatans','kecamatan','desas','tpss'));
    }

}
