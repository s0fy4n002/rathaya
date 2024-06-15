<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-index',
            'role-show',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-index',
            'permission-show',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-index',
            'user-show',
            'user-create',
            'user-edit',
            'user-delete',
            'master-index',
            'master-show',
            'master-create',
            'master-edit',
            'master-delete',

            'product-index',
            'product-show',
            'product-create',
            'product-edit',
            'product-delete',
            'firm-index',
            'firm-show',
            'firm-create',
            'firm-edit',
            'firm-delete',
            'person-index',
            'person-show',
            'person-create',
            'person-edit',
            'person-delete',
            'enabler-index',
            'enabler-show',
            'enabler-create',
            'enabler-edit',
            'enabler-delete',
            'partner-index',
            'partner-show',
            'partner-create',
            'partner-edit',
            'partner-delete',

            'member-index',
            'member-show',
            'member-create',
            'member-edit',
            'member-delete',
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
