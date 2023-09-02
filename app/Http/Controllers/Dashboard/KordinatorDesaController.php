<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Desa;
use App\Models\KordinatorD;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Dashboard\KordinatorDAction;
use App\Actions\Dashboard\KordinatorDDelete;
use App\DataTransferObjects\KordinatorDData;

class KordinatorDesaController extends Controller
{
    public function index()
    {
        $no = 0;
        $kordinators = KordinatorD::select(['name','lokasi_desa','slug'])->get();
        return view('dashboard.kordinatord.index', compact('no','kordinators'));
    }
    public function create()
    {
        $desas = Desa::select(['name','slug'])->get();
        return view('dashboard.kordinatord.create', compact('desas'));
    }
    public function store(KordinatorDData $kordinatorDData, KordinatorDAction $kordinatorDAction)
    {
        $kordinatorDAction->execute($kordinatorDData);
        return redirect()->route('dashboard.kordinator.desa.index')->with('success','Berhasil Menambahkan Kordinator Desa');
    }

    public function edit($slug)
    {
        $kordinatorD = KordinatorD::where('slug', $slug)->firstOrFail();
        $desas = Desa::select(['name','slug'])->get();
        return view('dashboard.kordinatord.edit', compact('kordinatorD','desas'));
    }
    public function update(KordinatorDData $kordinatorDData, KordinatorDAction $kordinatorDAction)
    {
        $kordinatorDAction->execute($kordinatorDData);
        return redirect()->route('dashboard.kordinator.desa.index')->with('success','Berhasil Update Kordinator Desa');
    }
    public function destroy(KordinatorDDelete $KordinatorDDelete, $slug)
    {
        $KordinatorDDelete->execute($slug);
        return redirect()->route('dashboard.kordinator.desa.index')->with('success','Berhasil Menghapus Kordinator Desa');

    }
}
