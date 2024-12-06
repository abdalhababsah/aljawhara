<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 5 admin users
        User::create([
            'name' => 'Admin One',
            'email' => 'admin1@jawhart-alsharq.com',
            'password' => Hash::make('AdminPass123'), // Use a strong password
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin Two',
            'email' => 'admin2@jawhart-alsharq.com',
            'password' => Hash::make('AdminPass123'), 
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin Three',
            'email' => 'admin3@jawhart-alsharq.com',
            'password' => Hash::make('AdminPass123'), 
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin Four',
            'email' => 'admin4@jawhart-alsharq.com',
            'password' => Hash::make('AdminPass123'), 
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Admin Five',
            'email' => 'admin5@jawhart-alsharq.com',
            'password' => Hash::make('AdminPass123'), 
            'email_verified_at' => now(),
        ]);

    }
}