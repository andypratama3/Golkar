<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;
    use SoftDeletes;

    protected $table = 'kecamatans';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug'
    ];

    //data deleted
    protected $dates = ['deleted_at'];

}
