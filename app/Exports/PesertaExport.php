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
        $pesertas = Peserta::all();
        $pesertas->transform(function ($peserta) {
            $peserta->umur = now()->diffInYears($peserta->tgl_lahir);
            return $peserta;
        });
        return view('dashboard.peserta.export', [
            'pesertas' => $pesertas,
        ]);
    }
    public function headings(): array
    {
        return ["name", "nik", "hp", "tgl_lahir", "alamat", "kecamatan", "desa", "tps", "warna"];
    }
}
