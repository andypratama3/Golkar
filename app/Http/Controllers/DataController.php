<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $no = 0;
        $kecamatans = Kecamatan::select('id','name','slug')->get();
        return view('dashboard.data.index', compact('kecamatans','no'));
    }
    public function kecamatan($name)
    {
        
    }
}
