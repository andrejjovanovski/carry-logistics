<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = [
            ['name' => 'Credit Card', 'description' => 'Payment made using a credit card issued by a bank or financial institution'],
            ['name' => 'Debit Card', 'description' => 'Payment made using a debit card linked directly to a bank account'],
            ['name' => 'Cash on Delivery', 'description' => 'Physical cash payment upon delivery (COD - Cash on Delivery) or at the point of transaction.'],
            ['name' => 'Bank Transfer', 'description' => 'Direct payment made from one bank account to another, often through online banking or wire transfer.'],
            ['name' => 'Invoice/Billing', 'description' => 'Payment made against an invoice, often on credit terms (e.g., Net 30, Net 60).'],
        ];

        foreach ($methods as $method) {
            PaymentMethod::create($method);
        }
    }
}
