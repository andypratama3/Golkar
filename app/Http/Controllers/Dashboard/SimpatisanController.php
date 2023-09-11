<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Peserta;

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
        return view('dashboard.peserta.simpatisan.index', compact('no', 'pesertas'));
    }



}

