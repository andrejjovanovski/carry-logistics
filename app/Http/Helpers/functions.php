<?php

function generateUniqueString($length = 10)
{
    do {
        // Generate a random string
        $randomNumber = str_pad(mt_rand(1, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);

        // Check if the string exists in the database
        $exists = \App\Models\Shipment::where('shipment_number', $randomNumber)->exists();
    } while ($exists);

    // Return the unique string
    return $randomNumber;
}
