<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@hospital.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password123'), // Change later in production
            ]
        );

        // Assign Admin role
        $admin->assignRole('Admin');
    }
}
