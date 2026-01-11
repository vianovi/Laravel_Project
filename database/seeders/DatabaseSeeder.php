<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * 1. Seed akun admin default
         *
         * AdminSeeder akan:
         * - membuat user dengan email: admin@laravel.test
         * - password: Superadmin123
         * - is_admin: 1
         * jika belum ada user dengan email tersebut.
         */
        $this->call(AdminSeeder::class);

        /**
         * 2. Seed data tambahan khusus environment "local" (developer mode)
         *
         * Bagian ini tidak akan dijalankan di production,
         * jadi aman dipakai untuk testing di laptop kamu sendiri.
         */
        if (app()->environment('local')) {
            // satu user deafult khusus untuk testing
            User::factory()->create([
                'name'  => 'Test User',
                'email' => 'test@example.com',
            ]);

            // Contoh: tambahan user baru menggunakan factory
            // User::factory(10)->create();
        }
    }
}

