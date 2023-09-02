<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tps;
use App\Models\Desa;
use App\Models\Peserta;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

use App\Exports\PesertaExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Actions\Dashboard\PesertaAction;
use App\DataTransferObjects\PesertaData;
use Illuminate\Support\Facades\Redirect;
use App\Actions\Dashboard\PesertaActionStore;
use App\Actions\Dashboard\DeletePesertaAction;
use App\Http\Requests\Dashboard\PesertaRequest;

class PesertaController extends Controller
{
    public function index()
    {
        $no = 0;
        $pesertas = Peserta::select(['name','nik','hp','tgl_lahir','alamat','warna','slug'])->orderBy('name')->get();
        return view('dashboard.peserta.index', compact('no', 'pesertas'));
    }
    ///nik tidak boleh sama
    public function create(Kecamatan $kecamatan)
    {
        $kecamatans = Kecamatan::select(['id','name','slug'])->get();
        return view('dashboard.peserta.create', compact('kecamatans'));
    }
    public function getnik(Request $request)
    {
        $input_nik = $request->input_nik;
        $pesertas = Peserta::where('nik', $input_nik)->first();
        if(!$pesertas)
        {
            return ['bisa' => 'Nomor NIK Bisa Digunakan.'];
        }else{
            return ['tidak' => 'Nomor NIK Telah Terdaftar.'];
        }
    }

    public function store(PesertaData $pesertaData, PesertaAction $PesertaAction)
    {
        $existingPesertaWithSameNik = Peserta::where('nik', $pesertaData->nik)->first();
        if ($existingPesertaWithSameNik && $existingPesertaWithSameNik->id != $pesertaData->id) {
            // NIK sudah digunakan oleh peserta lain
            return Redirect::route('dashboard.peserta.index', $pesertaData->slug)->with('error', 'Nik Telah Digunakan');
        }else{
            $PesertaAction->execute($pesertaData);
        }
        return redirect()->route('dashboard.peserta.index')->with('success','Berhasil Menambahkan Peserta');
    }
    public function show($slug)
    {
        $peserta = Peserta::where('slug', $slug)->firstOrFail();
        return view('dashboard.peserta.show', compact('peserta'));
    }

    public function edit($slug)
    {
        $kecamatans = Kecamatan::select(['id','name','slug'])->get();
        $peserta = Peserta::where('slug', $slug)->firstOrFail();
        return view('dashboard.peserta.edit', compact('kecamatans','peserta'));
    }
    public function update(PesertaData $pesertaData, PesertaAction $pesertaAction,$slug)
    {
        $pesertaAction->execute($pesertaData,$slug);
        return redirect()->route('dashboard.peserta.index')->with('success','Berhasil Update Peserta');
    }
    public function destroy(DeletePesertaAction $deletePesertaAction, $slug)
    {
        $deletePesertaAction->execute($slug);
        return redirect()->route('dashboard.peserta.index')->with('success','Berhasil Menghapups Peserta');
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
    public function export_page()
    {
        $pesertas = Peserta::all();
        return view('dashboard.peserta.export', compact('pesertas'));
    }

    public function export_excel()
    {
        // $excel = Excel::create();
        return Excel::download(new PesertaExport, 'pesertas.xlsx');

    }



}
