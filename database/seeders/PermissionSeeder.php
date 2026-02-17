<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $guard = "web";   
        Permission::insert([
            [
                'name' => 'akses-menu-admin',
                'guard_name' => $guard,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'create-donasi',
                'guard_name' => $guard,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'daftar-volunter',
                'guard_name' => $guard,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
