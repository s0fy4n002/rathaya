<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Tovercat;

class TovercatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tovercat = Tovercat::create([
            'name_lid' => 'Di Bawah 100 Juta',
            'cat_lid' => 'Ultra Mikro',
            'name_len' => 'Under 100 Million',
            'cat_len' => 'Ultra Micro',
            'f_active' => 1,
        ]);

        $tovercat = Tovercat::create([
            'name_lid' => '100 Juta - 300 Juta',
            'cat_lid' => 'Mikro',
            'name_len' => '100 Million - 300 Million',
            'cat_len' => 'Micro',
            'f_active' => 1,
        ]);

        $tovercat = Tovercat::create([
            'name_lid' => '300 Juta - 2,5 Miliar',
            'cat_lid' => 'Usaha Kecil',
            'name_len' => '300 Million - 2.5 Billion',
            'cat_len' => 'Small Business',
            'f_active' => 1,
        ]);

        $tovercat = Tovercat::create([
            'name_lid' => '2,5 Miliar - 50 Miliar',
            'cat_lid' => 'Usaha Menengah',
            'name_len' => '2.5 Billion - 50 Billion',
            'cat_len' => 'Medium Business',
            'f_active' => 1,
        ]);
    }
}
