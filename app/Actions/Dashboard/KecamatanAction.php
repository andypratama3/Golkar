<?php

namespace App\Actions\Dashboard;

use App\Models\Kecamatan;
use App\DataTransferObjects\KecamatanData;


class KecamatanAction {
    public function execute(KecamatanData $kecamatanData)
    {
        $kecamatan = Kecamatan::updateOrCreate(
            ['slug' => $kecamatanData->slug],
            [
                'name' => $kecamatanData->name,
            ],
        );

        return $kecamatan;
    }
}
