<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pickup_address_id',
        'delivery_country_id',
        'delivery_city_id',
        'delivery_area_id',
        'shipment_number',
        'pickup_date',
        'pickup_time',
        'note_for_pickup_driver',
        'delivery_name',
        'delivery_email',
        'delivery_phone_number',
        'delivery_address',
        'delivery_note',
        'delivery_reference',
        'shipping_type_id',
        'payment_method_id',
    ];
}
