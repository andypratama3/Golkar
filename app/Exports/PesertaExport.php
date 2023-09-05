<?php

namespace App\Exports;

use App\Models\Peserta;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesertaExport implements FromView, WithHeadings
{
    public function view(): view
    {
        return view('dashboard.peserta.export', [
            'pesertas' => Peserta::all()
        ]);
    }
    public function headings(): array
    {
        return ["name", "nik", "hp", "tgl_lahir", "alamat", "kecamatan", "desa", "tps", "warna"];
    }
}
