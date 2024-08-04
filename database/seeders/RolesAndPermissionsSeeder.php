<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // dispatcher
        Permission::create(['name' => 'edit shipments']);
        Permission::create(['name' => 'softdelete shipments']);
        Permission::create(['name' => 'approve shipments']);
        Permission::create(['name' => 'cancel shipments']); // for more shipments
        Permission::create(['name' => 'cancel shipment']); // only one shipment
        Permission::create(['name' => 'edit packages']);
        Permission::create(['name' => 'edit shipment status']);
        Permission::create(['name' => 'view shipments']);
        Permission::create(['name' => 'create shipment']);
        Permission::create(['name' => 'calculate freight']);


        // Admin
        Permission::create(['name' => 'forcedelete shipments']);
        Permission::create(['name' => 'edit statuses']);
        Permission::create(['name' => 'admin view shipments']);

        Role::create(['name' => 'dispatcher'])
            ->givePermissionTo([
                'edit shipments',
                'softdelete shipments',
                'approve shipments',
                'cancel shipments',
                'cancel shipment',
                'edit packages',
                'edit shipment status',
                'view shipments',
                'create shipment',
                'calculate freight'
            ]);

        Role::create(['name' => 'user'])
            ->givePermissionTo([
                'cancel shipment',
                'view shipments',
                'create shipment',
                'calculate freight'
            ]);

        Role::create(['name' => 'courier'])
            ->givePermissionTo([
                'view shipments',
                'edit shipment status',
            ]);



        Role::create(['name' => 'super-admin'])->givePermissionTo(Permission::all());


    }
}
