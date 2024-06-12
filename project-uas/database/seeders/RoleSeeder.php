<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'role_name'=>'Administrator',
        ]);

        Role::create([
            'name' => 'direktur',
            'guard_name' => 'web',
            'role_name'=>'Direktur',
        ]);

        Role::create([
            'name' => 'hrd',
            'guard_name' => 'web',
            'role_name'=>'HRD',
        ]);

        Role::create([
            'name' => 'karyawan',
            'guard_name' => 'web',
            'role_name'=>'Karyawan',
        ]);
    }
}
