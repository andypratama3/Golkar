<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;
use App\Http\Requests\Dashboard\PesertaRequest;

class PesertaData extends Data{

    public function __construct(
        public readonly string $name,
        public readonly array $tps,
        public readonly ?string $slug,

    ) {
        //
    }
    public static function fromRequest(PesertaRequest $request): self
    {
        return self::from([
            $request->getName(),
            $request->getNik(),
            $request->getWarna(),
            $request->getSlug(),
        ]);
    }

    public static function messages()
    {
        return [
            'name.required' => 'Kolom Nama Desa tidak boleh kosong!',
        ];
    }
}
