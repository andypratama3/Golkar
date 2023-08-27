<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Traits\UsesUuid;
use App\Http\Traits\NameHasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;
    use UsesUuid;
    use NameHasSlug;
    use SoftDeletes;

    protected $table = 'desas';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug'
    ];

    //data deleted
    protected $dates = ['deleted_at'];

    public function tps()
    {
        return $this->belongsToMany(Tps::class, 'tps_desa');
    }

}
