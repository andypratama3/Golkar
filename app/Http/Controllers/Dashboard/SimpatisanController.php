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
        $pesertas = Peserta::where('status', $status)->select(['name','nik','hp','tgl_lahir','alamat','warna','perekrut','slug'])->orderBy('name')->get();
        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });
        //loop kecamatan to selected
        $kecamatans = Kecamatan::select(['id','name'])->get();
        return view('dashboard.peserta.simpatisan.index', compact('no', 'pesertas', 'kecamatans'));
    }

    public function getPesertasimpatisan(Request $request)
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

    public function getPesertasimpatisanDesa(Request $request)
    {
        $status = 'simpatisan';
        $id_desa = $request->input('id_desa');
        $pesertas = Peserta::where('status',$status)->whereHas('desa_pesertas', function ($query) use ($id_desa) {
            $query->where('desa_id', $id_desa);
        })->get();
        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });
        return response()->json(['pesertas' => $pesertas]);
    }
    public function getPesertasimpatisanTps(Request $request)
    {
        $status = 'simpatisan';
        $tps_id = $request->input('tps_id');
        $desa_id = $request->input('desa_id');
        $pesertas = Peserta::where('status', $status)->whereHas('desa_pesertas', function ($query) use ($desa_id) {
            $query->where('desa_id', $desa_id);
        })
        ->get();
        $pesertas = Peserta::where('status', $status)->whereHas('tps_pesertas', function ($query) use ($tps_id) {
            $query->where('tps_id', $tps_id);
        })
        ->get();

        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });
        return response()->json(['pesertas' => $pesertas]);
    }

}

