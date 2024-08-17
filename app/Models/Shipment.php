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

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'delivery_country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'delivery_city_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'delivery_area_id');
    }

    public function pickupAddress()
    {
        return $this->belongsTo(Address::class, 'pickup_address_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id');
    }
}
