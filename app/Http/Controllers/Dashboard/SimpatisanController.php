<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Peserta;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SimpatisanController extends Controller
{
    public function index()
    {
        $status = 'simpatisan';
        $no = 0;
        $pesertas = Peserta::where('status', $status)->select(['name','nik','hp','tgl_lahir','alamat','warna','slug'])->orderBy('name')->get();
        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });
        //loop kecamatan to selected
        $kecamatans = Kecamatan::select(['id','name'])->get();
        return view('dashboard.peserta.simpatisan.index', compact('no', 'pesertas', 'kecamatans'));

    }
    public function getPesertaSimpatisan(Request $request)
    {
        $status = 'simpatisan';
        $id_kecamatan = $request->input('id_kecamatan');
        $pesertas = Peserta::where('status',$status)->whereHas('kecamatan_pesertas', function ($query) use ($id_kecamatan) {
            $query->where('kecamatan_id', $id_kecamatan);
        })->get();
        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });

        $kecamatans = Kecamatan::select(['id','name'])->get();
        return response()->json(['pesertas' => $pesertas]);
    }

}

