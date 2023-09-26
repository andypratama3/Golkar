<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tps;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Realcount;
use Illuminate\Http\Request;
use App\Charts\RealCountChart;
use App\Http\Controllers\Controller;
use App\Actions\Dashboard\RealCountAction;
use App\DataTransferObjects\RealCountData;

class RealCountController extends Controller
{
    public function index(RealCountChart $chart)
    {
        $kecamatans = Kecamatan::all();
        return view('dashboard.realcount.index',['chart' => $chart->build()], compact('kecamatans'));
    }
    public function create()
    {
        $kecamatans = Kecamatan::select(['id','name','slug'])->get();
        return view('dashboard.realcount.create', compact('kecamatans'));
    }
    // public function store(RealCountAction $realcountAction, RealCountData $realCount_data)
    public function store(RealCountAction $realcountAction, RealCountData $realCountData)
    {
        $realcountAction->execute($realCountData);
        return redirect()->route('dashboard.realcount.index')->with('success', 'Berhasil Menambahkan Realcount');
    }
    public function tabel()
    {
        $realcounts = Realcount::all();
        return view('dashboard.realcount.tabel', compact('realcounts'));
    }

    public function getDesaCount(Request $request)
    {
        $desa_id = $request->input('desa_id');
        $tps_id = $request->input('tps_id');
        $realcount = Realcount::whereHas('desa_realcount', function ($query) use ($desa_id) {
            $query->where('desa_id', $desa_id);
        })->get();
        return response()->json(['realcount' => $realcount]);
    }

}
