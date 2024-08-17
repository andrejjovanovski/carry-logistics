<?php

namespace Database\Seeders;

use App\Models\ShippingStatus;
use Illuminate\Database\Seeder;

class ShippingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [

            ['name' => 'Pending', 'description' => 'The shipment has been created but is not yet picked up or processed'],
            ['name' => 'Processing', 'description' => 'The shipment is being processed and prepared for dispatch'],
            ['name' => 'Picked Up', 'description' => 'The shipment has been picked up from the sender'],
            ['name' => 'In Transit', 'description' => 'The shipment is on its way to the destination'],
            ['name' => 'Out for Delivery', 'description' => 'The shipment is on the final leg of its journey and is out for delivery to the recipient'],
            ['name' => 'Delivered', 'description' => 'The shipment has been successfully delivered to the recipient'],
            ['name' => 'Failed Delivery Attempt', 'description' => 'The delivery attempt was unsuccessful, often due to the recipient not being available'],
            ['name' => 'Returned to Sender', 'description' => 'The shipment could not be delivered and is being returned to the sender'],
            ['name' => 'Held at Customs', 'description' => 'The shipment is being held by customs authorities for inspection or clearance'],
            ['name' => 'On Hold', 'description' => 'The shipment is temporarily on hold, often due to issues like incorrect address information or recipient unavailability'],
            ['name' => 'Damaged', 'description' => 'The shipment has been damaged during transit'],
            ['name' => 'Lost', 'description' => 'The shipment cannot be located and is considered lost'],
            ['name' => 'Cancelled', 'description' => 'The shipment has been cancelled by the sender or the shipping company'],
            ['name' => 'Awaiting Payment', 'description' => 'The shipment is pending until payment is received'],
            ['name' => 'Ready for Pickup', 'description' => 'The shipment is ready to be picked up by the recipient at a designated location'],
        ];

        foreach ($statuses as $status) {
            ShippingStatus::create($status);
        }
    }
}
