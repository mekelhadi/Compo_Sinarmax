<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $sinarmax = User::firstOrCreate(
            ['email' => 'sinarmax@gmail.com'],
            [
                'name' => 'SinarMax Admin',
                'password' => Hash::make('Sinarmax'),
                'email_verified_at' => now(),
            ]
        );
        $superAdminRole = Role::where('name', 'superadmin')->first();
        if ($superAdminRole) {
            $sinarmax->assignRole($superAdminRole);
        }

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );
        if ($superAdminRole) {
            $admin->assignRole($superAdminRole);
        }
    }
}
