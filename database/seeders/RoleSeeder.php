<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientRole = Role::create(['name' => 'client']);
        $trainerRole = Role::create(['name' => 'trainer']);
        $adminRole = Role::create(['name' => 'admin']);

        $gymOperatorRole = Role::create(['name' => 'gym-operator']);

        $gymOperatorPermission = Permission::create(['name' => 'manage-gym']);

        $basicPermission = Permission::create(['name' => 'use-Api', 'guard_name' => 'web']);

        $adminPermission = Permission::create(['name' => 'admin', 'guard_name' => 'web']);

        $basicTrainerPermission = Permission::create(['name' => 'train', 'guard_name' => 'web']);

        $clientRole->givePermissionTo($basicPermission);
        $gymOperatorRole->givePermissionTo($basicPermission,$gymOperatorPermission);
        $trainerRole->givePermissionTo($basicPermission,$basicTrainerPermission);
        $adminRole->givePermissionTo([$basicPermission, $adminPermission]);

    }
}
