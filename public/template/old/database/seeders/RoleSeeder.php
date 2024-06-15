<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo([
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
        ]);
        $staff = Role::create(['name' => 'Staff']);
        $staff->givePermissionTo([
            'master-index',
            'master-show',
            'product-index',
            'product-show',
            'firm-index',
            'firm-show',
            'person-index',
            'person-show',
            'enabler-index',
            'enabler-show',
            'partner-index',
            'partner-show',
        ]);
        $member = Role::create(['name' => 'Member']);
        $member->givePermissionTo([
            'member-index',
            'member-show',
            'member-create',
            'member-edit',
            'member-delete',
        ]);

    }
}
