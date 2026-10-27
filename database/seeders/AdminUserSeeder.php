<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@hewan.com',
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Buat beberapa admin tambahan
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin2@hewan.com',
            'password' => Hash::make('admin456'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Buat beberapa customer contoh
        User::create([
            'name' => 'Customer Contoh',
            'email' => 'customer@hewan.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ User admin dan customer berhasil dibuat!');
        $this->command->info('📧 Admin: admin@hewan.com');
        $this->command->info('🔑 Password: admin123');
    }
}