<?php
namespace App\Actions\Dashboard;

use App\Models\Realcount;
use App\DataTransferObjects\RealCountData;

class RealCountAction{

    public function execute(RealCountData $RealCountData)
    {
        $realcount = Realcount::updateOrCreate(
            ['slug' =>  $RealCountData->slug],
            [
                'total' => $RealCountData->total,
            ]
        );
        if(empty($RealCountData->slug)){
            $realcount->kecamatan_realcount()->attach($RealCountData->kecamatan);
            $realcount->desa_realcount()->attach($RealCountData->desa);
            $realcount->tps_realcount()->attach($RealCountData->tps);
        }else{
            $realcount->kecamatan_realcount()->sync($RealCountData->kecamatan);
            $realcount->desa_realcount()->sync($RealCountData->desa);
            $realcount->tps_realcount()->sync($RealCountData->tps);
        }
    }
}
