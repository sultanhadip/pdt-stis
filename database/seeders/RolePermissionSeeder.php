<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Daftar Permission
        Permission::create(['name' => 'akses-menu-dashboard']);
        Permission::create(['name' => 'akses-menu-keuangan']);
        Permission::create(['name' => 'akses-menu-events']);
        Permission::create(['name' => 'akses-menu-volunteer']);
        Permission::create(['name' => 'akses-menu-donasi']);
        Permission::create(['name' => 'akses-menu-galeri']);
        Permission::create(['name' => 'akses-menu-berita']);
        Permission::create(['name' => 'akses-menu-testimoni-feedback']);
        Permission::create(['name' => 'create-donasi']);
        Permission::create(['name' => 'daftar-volunter']);

        //Daftar Role
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'umum']);
        Role::create(['name' => 'mahasiswa']);

        //Atur permisssion
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo([
            'akses-menu-dashboard',
            'akses-menu-keuangan',
            'akses-menu-events',
            'akses-menu-volunteer',
            'akses-menu-donasi',
            'akses-menu-galeri',
            'akses-menu-berita',
            'akses-menu-testimoni-feedback'
        ]);
        
        $roleUmum = Role::findByName('umum');
        $roleUmum->givePermissionTo([
            'akses-menu-dashboard',
            'akses-menu-donasi',
        ]);

        $roleMahasiswa = Role::findByName('mahasiswa');
        $roleMahasiswa->givePermissionTo([
            'akses-menu-dashboard',
            'akses-menu-volunteer',
            'akses-menu-donasi',
        ]);
    }
}
