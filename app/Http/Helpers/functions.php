<?php

use Illuminate\Support\Str;

function generateUniqueString($length = 16)
{
    do {
        // Generate a random string
        $randomString = Str::random($length);

        // Check if the string exists in the database
        $exists = \App\Models\Shipment::where('shipment_number', $randomString)->exists();
    } while ($exists);

    // Return the unique string
    return $randomString;
}

// Usage
