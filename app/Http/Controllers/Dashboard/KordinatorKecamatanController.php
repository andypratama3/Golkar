<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Kecamatan;
use App\Models\KordinatorK;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Dashboard\KordinatorKAction;
use App\Actions\Dashboard\KordinatorKDelete;
use App\DataTransferObjects\KordinatorKData;

class KordinatorKecamatanController extends Controller
{
    public function index()
    {
        $no = 0;
        $kordinators = KordinatorK::select(['name','slug','lokasi_kecamatan'])->get();
        return view('dashboard.kordinatork.index', compact('kordinators','no'));
    }
    public function create()
    {
        $kecamatans = Kecamatan::select(['name','slug'])->get();
        return view('dashboard.kordinatork.create', compact('kecamatans'));
    }
    public function store(KordinatorKData $kordinatorKData, KordinatorKAction $kordinatorKAction)
    {
        $kordinatorKAction->execute($kordinatorKData);
        return redirect()->route('dashboard.kordinator.kecamatan.index')->with('success','Berhasil Menambahkan Kordinator Kecamatan');
    }
    public function edit($slug)
    {
        $kordinatork = KordinatorK::where('slug', $slug)->firstOrFail();
        $kecamatans = Kecamatan::select(['name','slug'])->get();
        return view('dashboard.kordinatork.edit', compact('kordinatork','kecamatans'));
    }
    public function update(KordinatorKData $kordinatorKData, KordinatorKAction $kordinatorKAction)
    {
        $kordinatorKAction->execute($kordinatorKData);
        return redirect()->route('dashboard.kordinator.kecamatan.index')->with('success','Berhasil Update Kordinator Kecamatan');
    }
    public function destroy(KordinatorKDelete $kordinatorKDelete, $slug)
    {
        $kordinatorKDelete->execute($slug);
        return redirect()->route('dashboard.kordinator.kecamatan.index')->with('success','Berhasil Hapus Kordinator Kecamatan');

    }
}
