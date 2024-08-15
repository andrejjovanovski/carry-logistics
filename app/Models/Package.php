<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_id',
        'weight',
        'length',
        'width',
        'height',
        'description',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
