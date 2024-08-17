<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(ShippingStatusSeeder::class);
        $this->call(ShippingTypeSeeder::class);

    }
}
