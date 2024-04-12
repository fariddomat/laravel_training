<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@training.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'Coach',
            'email' => 'coach@training.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('coach');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@training.com',
            'password' => bcrypt('password'), // Replace with a secure password
            // ... other user attributes ...
        ]);
        $user->assignRole('trainee');
    }
}
