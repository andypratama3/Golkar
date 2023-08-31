<?php

namespace App\Actions\Dashboard;

use App\Models\Peserta;
use App\DataTransferObjects\PesertaData;


class PesertaAction {
    public function execute(PesertaData $pesertaData)
    {
        $peserta = Peserta::updateOrCreate(
            ['slug' => $pesertaData->slug],
            [
                'name' => $pesertaData->name,
                'nik' => $pesertaData->nik,
                'tgl_lahir' => $pesertaData->tgl_lahir,
                'hp' => $pesertaData->hp,
                'alamat' => $pesertaData->alamat,
                'warna' => $pesertaData->warna,

            ],
        );

        if(empty($pesertaData->slug)){
            $peserta->kecamatan()->attach($pesertaData->kecamatan);
            $peserta->desa()->attach($pesertaData->desa);
            $peserta->tps()->attach($pesertaData->tps);
        }else{
            $peserta->kecamatan()->sync($pesertaData->kecamatan);
            $peserta->desa()->sync($pesertaData->desa);
            $peserta->tps()->sync($pesertaData->tps);
        }


        return $peserta;
    }
}
