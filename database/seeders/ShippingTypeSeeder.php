<?php

namespace Database\Seeders;

use App\Models\ShippingType;
use Illuminate\Database\Seeder;

class ShippingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Standard', 'description' => 'Basic ground or surface transportation, typically with a longer delivery time and lower cost'],
            ['name' => 'Express', 'description' => 'Faster delivery service compared to standard shipping, often used for urgent shipments'],
        ];

        foreach ($types as $type) {
            ShippingType::create($type);
        }
    }
}
