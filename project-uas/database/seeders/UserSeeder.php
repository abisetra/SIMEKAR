<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Karyawan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');
        $direkturRoleId = DB::table('roles')->where('name', 'direktur')->value('id');
        $hrdRoleId = DB::table('roles')->where('name', 'hrd')->value('id');
        $karyawanRoleId = DB::table('roles')->where('name', 'karyawan')->value('id');
        $admin = 
        User::create([
            'role_id' => $adminRoleId,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
    
        ]);
        Karyawan::create([
            'nama_karyawan' => $admin->name,
            'email_karyawan' => $admin->email,
            'nik' => '337204',
            'users_id' => $admin->id,
            'jabatan_id' => 1,
            'departement_id' => 2,
            'kota_lahir' => 'Surakarta',
            'tgl_lahir' => date('Y-m-d'),
            'tgl_masuk' => date('Y-m-d'),
            'alamat' => 'Jl Bima No 88',
            'kota_asal' => 'Surakarta',
            'jenis_kelamin'=>'Laki-laki',
            'agama'=>'Kristen',
            'telepon'=>'0822321731',
            'status_karyawan'=>'Tetap',
        ]);

        $direktur = User::create([
            'role_id' => $direkturRoleId,
            'name' => 'direktur',
            'email' => 'direktur@gmail.com',
            'password' => bcrypt('123'),
        ]);
        Karyawan::create([
                'nama_karyawan' => $direktur->name,
                'email_karyawan' => $direktur->email,
                'nik' => '337203',
                'users_id' => $direktur->id,
                'jabatan_id' => 2,
                'departement_id' => 3,
                'kota_lahir' => 'Surakarta',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'alamat' => 'Jl Arjuna No 88',
                'kota_asal' => 'Surakarta',
                'jenis_kelamin'=>'Laki-laki',
                'agama'=>'Islam',
                'telepon'=>'08123456789',
                'status_karyawan'=>'Tetap',
            ]);

        $hrd = User::create([
            'role_id' => $hrdRoleId,
            'name' => 'hrd',
            'email' => 'hrd@gmail.com',
            'password' => bcrypt('123'),
        ]);
        Karyawan::create([
                'nama_karyawan' => $hrd->name,
                'email_karyawan' => $hrd->email,
                'nik' => '337202',
                'users_id' => $hrd->id,
                'jabatan_id' => 1,
                'departement_id' => 3,
                'kota_lahir' => 'Surakarta',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'alamat' => 'Jl Sadewa No 88',
                'kota_asal' => 'Surakarta',
                'jenis_kelamin'=>'Perempuan',
                'agama'=>'Katolik',
                'telepon'=>'08123226789',
                'status_karyawan'=>'Magang',
            ]);

        $karyawan = User::create([
            'role_id' => $karyawanRoleId,
            'name' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'password' => bcrypt('123'),
        ]);

        Karyawan::create([
                'nama_karyawan' => $karyawan->name,
                'email_karyawan' => $karyawan->email,
                'nik' => '337201',
                'users_id' => $karyawan->id,
                'jabatan_id' => 1,
                'departement_id' => 4,
                'kota_lahir' => 'Surakarta',
                'tgl_lahir' => date('Y-m-d'),
                'tgl_masuk' => date('Y-m-d'),
                'alamat' => 'Jl Wekudara No 88',
                'kota_asal' => 'Surakarta',
                'jenis_kelamin'=>'Laki-laki',
                'agama'=>'Budha',
                'telepon'=>'08123426789',
                'status_karyawan'=>'Magang',
            ]);
        

        
    }
}
