<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => '2023-11-28 10:32:34',
            'password' => bcrypt('admin'),
        ]);
        $admin->assignRole('admin');

        $umum = User::create([
            'name' => 'umum',
            'username' => 'umum',
            'email' => 'umum@example.com',
            'email_verified_at' => '2023-11-28 10:32:34',
            'password' => bcrypt('umum'),
        ]);
        $umum->assignRole('umum');

        $mhs = User::create([
            'name' => 'mahasiswa',
            'username' => 'mhs',
            'email' => 'mhs@example.com',
            'email_verified_at' => '2023-11-28 10:32:34',
            'password' => bcrypt('mahasiswa'),
        ]);
        $mhs->assignRole('mahasiswa');
    }
}
