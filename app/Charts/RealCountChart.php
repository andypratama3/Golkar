<?php
namespace App\Charts;

use App\Models\Realcount;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class RealCountChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    // {
    //     // $results = Realcount::select('desa_id', 'tps_id', DB::raw('SUM(total) as total'))
    //     // ->groupBy('desa_id', 'tps_id')
    //     // ->get();
    //     // $count = DB::table('kecamatans')
    //     // ->select('kecamatans.name as kecamatan_name')
    //     // ->leftJoin('real_count_kecamatan', 'kecamatan.id', '=', 'real_count_kecamatan.kecamatan.id')
    //     // ->get();
    //     $count = DB::table('kecamatans')
    //     ->select('kecamatans.name as kecamatan_name', DB::raw('SUM(realcounts.total) as total'))
    //     ->leftJoin('real_count_kecamatan', 'kecamatans.id', '=', 'real_count_kecamatan.kecamatan_id')
    //     ->groupBy('kecamatans.name')
    //     ->get();

    //     $chart = $this->chart->barChart();
    //     $chart->addData('Total', [10,10]);
    //     $chart->setXAxis($count->pluck('kecamatan_name')->toArray());
    //     $chart->setTitle('Total Counts Grouped by Desa and Kecamatan');

    //     return $chart;
    // }
    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $count = DB::table('kecamatans')
            ->select('kecamatans.name as kecamatan_name', DB::raw('SUM(realcounts.total) as total'))
            ->leftJoin('real_count_kecamatan', 'kecamatans.id', '=', 'real_count_kecamatan.kecamatan_id')
            ->leftJoin('realcounts', 'real_count_kecamatan.realcount_id', '=', 'realcounts.id')
            ->groupBy('kecamatans.name')
            ->get();


        $countall = $count->sum('total');
        $chart = $this->chart->barChart();
        $chart->addData('Total', $count->pluck('total')->toArray());
        $chart->setXAxis($count->pluck('kecamatan_name')->toArray());
        $chart->setTitle("Total Semua = $countall");


        return $chart;
    }
}
