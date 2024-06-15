<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bentity;

class BentitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bentity = Bentity::create([
            'name_lid' => 'Perseroan Terbatas (PT)',
            'nameshort_lid' => 'PT',
            'name_len' => 'Perseroan Terbatas (PT)',
            'nameshort_len' => 'PT',
            'f_active' => 1,
        ]);

        $bentity = Bentity::create([
            'name_lid' => 'Persekutuan Komanditer (CV)',
            'nameshort_lid' => 'CV',
            'name_len' => 'Commanditaire Vennootschap (CV)',
            'nameshort_len' => 'CV',
            'f_active' => 1,
        ]);

        $bentity = Bentity::create([
            'name_lid' => 'Koperasi',
            'nameshort_lid' => 'Koperasi',
            'name_len' => 'Cooperation',
            'nameshort_len' => 'Cooperation',
            'f_active' => 1,
        ]);

        $bentity = Bentity::create([
            'name_lid' => 'Badan Usaha Milik Desa (BUMDES)',
            'nameshort_lid' => 'BUMDES',
            'name_len' => 'Badan Usaha Milik Desa (BUMDES)',
            'nameshort_len' => 'BUMDES',
            'f_active' => 1,
        ]);

        $bentity = Bentity::create([
            'name_lid' => 'Kelompok',
            'nameshort_lid' => 'Kelompok',
            'name_len' => 'Group',
            'nameshort_len' => 'Group',
            'f_active' => 1,
        ]);
    }
}
