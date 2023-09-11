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
        public readonly string $status,
        public readonly ?string $slug,
        public readonly ?int $id // Properti id ditambahkan


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
            $request->getStatus(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama tidak boleh kosong!',
            'nik.required' => 'Kolom Nik tidak boleh kosong!',
            'nik.max' => 'Kolom Nik tidak boleh lebih dari 16 karakter!',
            'hp.required' => 'Kolom Nomor Hp tidak boleh kosong!',
            'tgl_lahir.required' => 'Kolom Tanggal Lahir tidak boleh kosong!',
            'alamat.required' => 'Kolom alamat tidak boleh kosong!',
            'warna.required' => 'Kolom warna tidak boleh kosong!',
            'kecamatan.required' => 'Kolom Kecamatan tidak boleh kosong!',
            'desa.required' => 'Kolom Desa tidak boleh kosong!',
            'tps.required' => 'Kolom Tps tidak boleh kosong!',
            'status.required' => 'Kolom Status tidak boleh kosong!',
        ];
    }
}
