<?php

namespace App\Exports;

use App\Models\Peserta;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesertaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return view('dashboard.peserta.export');
       // Load related models and select the columns you need
    //    $pesertas = Peserta::select('kecamatan_pesertas', 'desa_pesertas', 'tps_pesertas')
    //    ->select(['name', 'nik', 'hp', 'tgl_lahir', 'alamat', 'warna'])
    //    ->get();
    //     // Transform the data as needed

    //     $data = $pesertas->map(function ($peserta) {
    //         return [
    //             'name' => $peserta->name,
    //             'nik' => $peserta->nik,
    //             'hp' => $peserta->hp,
    //             'tgl_lahir' => $peserta->tgl_lahir,
    //             'alamat' => $peserta->alamat,
    //             'kecamatan' => $peserta->kecamatan_pesertas->name,
    //             'desa' => $peserta->desa_pesertas->name,
    //             'tps' => $peserta->tps_pesertas->name,
    //             'warna' => $peserta->warna,
    //         ];

    //     });

        }

        public function headings(): array
        {
        return ["name", "Nik", "hp", "tgl_lahir", "alamat", "kecamatan", "desa", "tps", "warna"];
        }
}
