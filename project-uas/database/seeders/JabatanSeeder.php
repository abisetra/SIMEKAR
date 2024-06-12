<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            ['jabatan_name'=>'Chief'],
            ['jabatan_name'=>'Manager'],
            ['jabatan_name'=>'Supervisor'],
            ['jabatan_name'=>'Head'],
            ['jabatan_name'=>'Helper'],
        ];
        foreach($jabatan as $row)
        {
            jabatan::create($row);
        }
    }
}
