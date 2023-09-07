<?php

namespace App\Charts;

use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class CountSelectColor
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $kecamatans = Kecamatan::all();
        $kecamatanNames = [];

        foreach ($kecamatans as $kecamatan) {
            $kecamatanNames[] = $kecamatan->name;
        }

        $colors = DB::table('kecamatans')
        ->select('kecamatans.name as kecamatan_name')
        ->selectRaw('SUM(CASE WHEN pesertas.warna = "kuning" THEN 1 ELSE 0 END) as kuning_total')
        ->selectRaw('SUM(CASE WHEN pesertas.warna = "abu-abu" THEN 1 ELSE 0 END) as abu_total')
        ->selectRaw('SUM(CASE WHEN pesertas.warna = "merah" THEN 1 ELSE 0 END) as merah_total')
        ->leftJoin('peserta_kecamatan', 'kecamatans.id', '=', 'peserta_kecamatan.kecamatan_id')
        ->leftJoin('pesertas', function ($join) {
            $join->on('peserta_kecamatan.peserta_id', '=', 'pesertas.id')
                 ->whereNull('pesertas.deleted_at'); // Filter out deleted records
        })
        ->groupBy('kecamatans.name')
        ->get();

        $chart = $this->chart->barChart();
        $chart->addData('Kuning', $colors->pluck('kuning_total')->toArray());
        $chart->addData('Abu-Abu', $colors->pluck('abu_total')->toArray());
        $chart->addData('Merah', $colors->pluck('merah_total')->toArray());
        $chart->setXAxis($kecamatanNames);
        return $chart;

    }
}
