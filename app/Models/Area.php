<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'city_id',
        'name',
        'zip_code',
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
