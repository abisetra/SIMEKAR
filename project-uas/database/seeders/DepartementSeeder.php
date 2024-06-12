<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departement = [
            ['departement_name'=>'House Keeping'],
            ['departement_name'=>'Front Office'],
            ['departement_name'=>'F&B Service'],
            ['departement_name'=>'F&B Production'],
        ];
        foreach($departement as $row)
        {
            Departement::create($row);
        }
    }
}
