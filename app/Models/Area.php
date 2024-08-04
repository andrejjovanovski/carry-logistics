<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'city_id',
        'name',
        'zip_code',
    ];
}
