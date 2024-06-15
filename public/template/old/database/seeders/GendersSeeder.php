<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Gender;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gender = Gender::create([
            'name_lid' => 'Pria',
            'name_len' => 'Male', 
            'f_active' => 1,
        ]);

        $gender = Gender::create([
            'name_lid' => 'Wanita',
            'name_len' => 'Female', 
            'f_active' => 1,
        ]);

        $gender = Gender::create([
            'name_lid' => 'Tidak Menjawab',
            'name_len' => 'Prefer Not To Say', 
            'f_active' => 1,
        ]);
    }
}
