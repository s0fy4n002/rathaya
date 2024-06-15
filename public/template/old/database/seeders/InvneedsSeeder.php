<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Invneed;

class InvneedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $invneed = Invneed::create([
            'name_lid' => 'Pengembangan Kapasitas',
            'name_len' => 'Capacity Building',
            'f_active' => 1,
        ]);

        $invneed = Invneed::create([
            'name_lid' => 'Hibah',
            'name_len' => 'Grant',
            'f_active' => 1,
        ]);

        $invneed = Invneed::create([
            'name_lid' => 'Pinjaman',
            'name_len' => 'Loan',
            'f_active' => 1,
        ]);

        $invneed = Invneed::create([
            'name_lid' => 'Investasi',
            'name_len' => 'Investment',
            'f_active' => 1,
        ]);
    }
}
