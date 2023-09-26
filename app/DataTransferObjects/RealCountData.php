<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\RealCountRequest;


class RealCountData extends Data{

    public function __construct(
        public readonly string $total,
        public readonly string $kecamatan,
        public readonly string $desa,
        public readonly string $tps,
        public readonly ?string $slug,


    ) {
        //
    }
    public static function fromRequest(RealCountRequest $request): self
    {
        return self::from([
            $request->getTotal(),
            $request->getKecamatan(),
            $request->getDesa(),
            $request->getTps(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'total.required' => 'Kolom Total Suara tidak boleh kosong!',
            'kecamatan.required' => 'Kolom Kecamatan tidak boleh kosong!',
            'desa.required' => 'Kolom Desa tidak boleh kosong!',
            'tps.required' => 'Kolom Tps tidak boleh kosong!',

        ];
    }
}
