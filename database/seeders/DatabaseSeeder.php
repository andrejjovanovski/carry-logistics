<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Andrej Jovanovski',
            'email' => 'andrej@carrylogistics.com',
            'gender' => 'male',
            'date_of_birth' => '1995-05-20',
            'phone_number' => '+381 64 123 456',
            'country_id' => '128',
            'city_id' => '2',
            'area_id' => '1',
            'address' => 'Cvijanovacka 13, Belgrade',
            'password' => Hash::make('password'),
        ])->assignRole('super-admin');
        User::create([
            'name' => 'Leonardo Dimitrov',
            'email' => 'leonardo@carrylogistics.com',
            'gender' => 'male',
            'date_of_birth' => '2000-03-06',
            'phone_number' => '+381 65 432 109',
            'country_id' => '128',
            'city_id' => '6',
            'area_id' => '1',
            'address' => 'Gornje Mladenovica 3, Novi Sad',
            'password' => Hash::make('password'),
        ])->assignRole('super-admin');
    }
}
