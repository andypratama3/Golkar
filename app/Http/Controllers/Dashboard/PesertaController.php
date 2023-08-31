<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tps;
use App\Models\Desa;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Dashboard\PesertaAction;
use App\DataTransferObjects\PesertaData;

class PesertaController extends Controller
{
    public function index()
    {
        return view('dashboard.peserta.index');
    }
    ///nik tidak boleh sama
    public function create(Kecamatan $kecamatan)
    {
        $kecamatans = Kecamatan::select(['id','name','slug'])->get();

        foreach ($kecamatans as $kecamatan){

        }
        return view('dashboard.peserta.create', compact('kecamatans'));
    }
    public function store(PesertaData $pesertaData, PesertaAction $pesertaAction)
    {
        $pesertaAction->execute($pesertaData);
        return redirect()->route('dashboard.peserta.index')->with('status','Berhasil Menambahkan Peserta');
    }

    //get data drop down
    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $kecamatans = Kecamatan::where('id',$id_kecamatan)->select(['id','name','slug'])->get();

        $option = "<option>Pilih Desa</option>";
        foreach ($kecamatans as $kecamatan) {
            foreach ($kecamatan->desa as $desa) {
                $option.= "<option value='$desa->id'>$desa->name</option>";
           }
        }
        echo $option;
    }
    public function gettps(Request $request)
    {
        $id_desa = $request->id_desa;
        $desas = Desa::where('id', $id_desa)->get();
        $option = "<option>Pilih Tps</option>";
        foreach ($desas as $key => $desa) {
            foreach ($desa->tps as $tps) {
                    $option.= "<option value='$tps->id'>$tps->name</option>";
                }
            }
        echo $option;
        }

}
