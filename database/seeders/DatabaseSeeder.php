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

        User::create([
            'name' => 'Andrej Jovanovski',
            'email' => 'andrej@carrylogistics.com',
            'gender' => 'male',
            'dob' => '1995-05-20',
            'phone' => '+381 64 123 456',
            'country' => 'Serbia',
            'city' => 'Belgrade',
            'zipcode' => '101801',
            'address' => 'Cvijanovacka 13, Belgrade',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Leonardo Dimitrov',
            'email' => 'leonardo@carrylogistics.com',
            'gender' => 'male',
            'dob' => '2000-03-06',
            'phone' => '+381 65 432 109',
            'country' => 'Serbia',
            'city' => 'Novi Sad',
            'zipcode' => '21000',
            'address' => 'Gornje Mladenovica 3, Novi Sad',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
