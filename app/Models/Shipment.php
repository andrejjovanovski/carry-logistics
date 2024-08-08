<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipment_number',
        'pickup_date',
        'pickup_time_one',
        'pickup_time_two',
        'note_for_pickup_driver',
        'delivery_name',
        'delivery_email',
        'delivery_phone_number',
        'delivery_address',
        'delivery_note',
        'delivery_reference',

    ];
}
