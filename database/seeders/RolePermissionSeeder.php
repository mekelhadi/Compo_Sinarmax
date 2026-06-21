<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DAFTAR PERMISSION
        $permissions = [
            'manage statistics',
            'manage products',
            'manage principles',
            'manage testimonials',
            'manage clients',
            'manage teams',
            'manage abouts',
            'manage appointments',
            'manage hero sections',
        ];

        // SIMPAN PERMISSION
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // =========================
        // ROLE SUPER ADMIN
        // =========================
        $superAdminRole = Role::firstOrCreate([
            'name' => 'superadmin'
        ]);

        // SUPERADMIN DAPAT SEMUA PERMISSION
        $superAdminRole->syncPermissions($permissions);

        // USER SUPER ADMIN
        $superAdmin = User::firstOrCreate(
            ['email' => 'super@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('123123')
            ]
        );

        $superAdmin->assignRole($superAdminRole);

        // =========================
        // ROLE MANAGER
        // =========================
        $managerRole = Role::firstOrCreate([
            'name' => 'manager'
        ]);

        $managerPermissions = [
            'manage products',
            'manage testimonials',
            'manage clients',
            'manage appointments',
        ];

        $managerRole->syncPermissions($managerPermissions);

        // USER MANAGER
        $manager = User::firstOrCreate(
            ['email' => 'manager@admin.com'],
            [
                'name' => 'Manager',
                'password' => bcrypt('123123')
            ]
        );

        $manager->assignRole($managerRole);

        // =========================
        // ROLE STAFF
        // =========================
        $staffRole = Role::firstOrCreate([
            'name' => 'staff'
        ]);

        $staffPermissions = [
            'manage appointments',
            'manage testimonials',
        ];

        $staffRole->syncPermissions($staffPermissions);

        // USER STAFF
        $staff = User::firstOrCreate(
            ['email' => 'staff@admin.com'],
            [
                'name' => 'Staff',
                'password' => bcrypt('123123')
            ]
        );

        $staff->assignRole($staffRole);
    }
}