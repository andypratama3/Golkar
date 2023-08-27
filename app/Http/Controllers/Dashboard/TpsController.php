<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tps;
use Illuminate\Http\Request;
use App\Actions\Dashboard\TpsAction;
use App\DataTransferObjects\TpsData;
use App\Http\Controllers\Controller;

class TpsController extends Controller
{
    public function index()
    {
        $limit = 15;
        $tpss = Tps::select(['name', 'slug'])->orderBy('name')->paginate($limit);
        $count = $tpss->count();
        $no = $limit * ($tpss->currentPage() - 1);

        return view('dashboard.data.tps.index', compact(
            'tpss',
            'count',
            'no'
        ));
    }
    public function create()
    {
        return view('dashboard.data.tps.create');
    }
    public function store(TpsData $TpsData, TpsAction $TpsAction)
    {
        $TpsAction->execute($TpsData);
        return redirect()->route('dashboard.datamaster.tps.index')->with('success','Berhasil Menambah Desa');
    }
}

