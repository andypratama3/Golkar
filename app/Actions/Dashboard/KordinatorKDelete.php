<?php

namespace App\Actions\Dashboard;

use App\Models\KordinatorK;


class KordinatorKDelete {

    public function execute($kordinatorKecamatan)
    {
        $kordinatorKecamatan->delete();
    }
}
