<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;

    protected $fillable = [
        'country_id',
        'name',
    ];

    public $translatable = ['name'];

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }
}
