<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findByName('admin');
        $user = User::firstOrCreate(
            ['email' => 'sikko4890@gmail.com'],
            [
                'name' => 'Admin',
                'surname' => 'User',
                'password' => Hash::make('sikko4890@gmail.com'),
                'role_id' => $role->id,
                'email_verified_at' => now(),
            ]
        );

        $user->assignRole($role);

        $user->tokens()->delete();
        $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();

        $token = $user->createToken(
            name: "Seeder Token for {$user->email}",
            abilities: $permissions
        )->plainTextToken;

        $this->command->info("User created:");
        $this->command->line("Email: sikko4890@gmail.com");
        $this->command->line("Password: sikko4890@gmail.com");
        $this->command->line("Token: $token");
    }
}
