<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\PesertaRequest;

class PesertaData extends Data{

    public function __construct(
        public readonly string $name,
        public readonly string $nik,
        public readonly string $tgl_lahir,
        public readonly int $hp,
        public readonly string $kecamatan,
        public readonly string $desa,
        public readonly string $tps,
        public readonly string $alamat,
        public readonly string $warna,
        public readonly ?string $slug,

    ) {
        //
    }
    public static function fromRequest(PesertaRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getNik(),
            $request->getTglLahir(),
            $request->getHp(),
            $request->getKecamatan(),
            $request->getDesa(),
            $request->getTps(),
            $request->getAlamat(),
            $request->getWarna(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'nik.required' => 'Kolom Nik tidak boleh kosong!',
            'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong!',
            'alamat.required' => 'Kolom alamat tidak boleh kosong!',
            'warna.required' => 'Kolom warna tidak boleh kosong!',
        ];
    }
}
