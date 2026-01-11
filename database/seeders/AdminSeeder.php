<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cegah duplikasi kalau seeder dijalankan berkali-kali
        if (!User::where('email', 'admin@laravel.test')->exists()) {
            User::create([
                'name'     => 'Administrator1',
                'email'    => 'admin@laravel.test',
                'password' => Hash::make('Superadmin123'),
                'is_admin' => 1,
            ]);
        }
    }
    /**
     * Indicate bahwa email belum diverifikasi.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
