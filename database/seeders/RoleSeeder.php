<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $guard = "web";

        // Role Admin
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => $guard,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role -> givePermissionTo([
            'akses-menu-admin'
        ]);

        // Role Umum
        $role = Role::create([
            'name' => 'umum',
            'guard_name' => $guard,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role -> givePermissionTo([
            'create-donasi'
        ]);

        // Role Mahasiswa
        $role = Role::create([
            'name' => 'mahasiswa',
            'guard_name' => $guard,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $role -> givePermissionTo([
            'daftar-volunter'
        ]);
    }
}
