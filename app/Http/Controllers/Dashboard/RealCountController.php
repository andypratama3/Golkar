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

    public function getDesaCount(Request $request)
    {
        $id_desa = $request->id_desa;
        // $desa = Desa::find($id_desa);

        // $realCount_datas = Realcount::all();
        // $option = "<option>Pilih Tps</option>";

        $desa = Desa::where('id', $id_desa)->firstOrFail();

        $realCount_data = Realcount::all();
        foreach ($realCount_data as $realcount) {
            foreach ($realcount->tps_realcount as $tps) {
                $tps->where('id')->get();

                if($realcount !=  $id_desa && $tps){
                    return response('Data Tidak Ada', 404);
                }else{
                    $tpss = Tps::all();
                    $option .= "<option value='$tpss->id'>$tpss->name</option>";
                }
            }
        }


    // if ($desa) {
    //     // Retrieve existing TPS IDs for the selected Desa using the relationship
    //     $existingTpsIds = $desa->tps->pluck('id')->toArray();

    //     // Filter TPS options to exclude those that exist in real_count_tps
    //     foreach ($realCount_datas as $realCount_data) {
    //         foreach ($realCount_data->tps_realcount as $tps) {
    //             $option .= "<option value='$tps->id'>$tps->name</option>";
    //         }
    //     }
    // } else {
    //     // If the selected Desa is not found, show all TPS options
    //     $tpsOptions = Tps::all();

    //     foreach ($tpsOptions as $tps) {
    //         $option .= "<option value='$tps->id'>$tps->name</option>";
    //     }
    // }
    //     echo $option;
    }


}
