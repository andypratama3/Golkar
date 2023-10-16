<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Dpt;
use Illuminate\Http\Request;
use App\Actions\Dashboard\DptAction;
use App\DataTransferObjects\DptData;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controlle\Dashboard\Convert\Excel;
use App\Actions\Dashboard\DeleteDptAction;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Html;


class DptController extends Controller
{
    public function index()
    {
        $no = 0;
        $dpts = Dpt::select(['id','name','file','slug'])->get();
        return view('dashboard.dpt.index', compact('dpts','no'));
    }
    public function create()
    {
        return view('dashboard.dpt.create');
    }
    public function store(DptData $dptData, DptAction $dptAction)
    {
        $dptAction->execute($dptData);
        return redirect()->route('dashboard.dpt.index')->with('success','Berhasil Menambah Dpt');
    }
    public function destroy(DeleteDptAction $deleteActionDpt,$slug)
    {
        $deleteActionDpt->execute($slug);
        return redirect()->route('dashboard.dpt.index')->with('success','Berhasil Menghapus Dpt');
    }
    public function show($id){

        $dpt = Dpt::where('id',$id)->firstOrFail();

        $fileExtension = pathinfo($dpt->file, PATHINFO_EXTENSION);
        // dd($fileExtension);
        if($fileExtension == "xlsx"){
            $excelFilePath = public_path('public/storage/file/dpt/' . $dpt->file);
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFilePath);

            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray();
            return view('dashboard.dpt.show_excel', compact('data'));
        }elseif($fileExtension == "pdf"){
            return view('dashboard.dpt.show', compact('dpt'));
        }
    }

}
