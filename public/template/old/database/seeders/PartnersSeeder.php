<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Partner;

class PartnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $partner = Partner::create([
            'name' => 'Mitra #1',
            'logo' => 'mitra_1.jpg',
            'website' => 'bnpb.go.id',
            'f_active' => 1,
        ]);

        // 2
        $partner = Partner::create([
            'name' => 'Mitra #2',
            'logo' => 'mitra_2.jpg',
            'website' => 'menlhk.go.id',
            'f_active' => 1,
        ]);

        // 3
        $partner = Partner::create([
            'name' => 'Mitra #3',
            'logo' => 'mitra_3.jpg',
            'website' => 'mitra3.id',
            'f_active' => 1,
        ]);

        // 4
        $partner = Partner::create([
            'name' => 'Mitra #4',
            'logo' => 'mitra_4.jpg',
            'website' => 'mitra4.id',
            'f_active' => 1,
        ]);

        // 5
        $partner = Partner::create([
            'name' => 'Mitra #5',
            'logo' => 'mitra_5.jpg',
            'website' => 'mitra5.id',
            'f_active' => 1,
        ]);

        // 6
        $partner = Partner::create([
            'name' => 'Mitra #6',
            'logo' => 'mitra_6.jpg',
            'website' => 'mitra6.id',
            'f_active' => 1,
        ]);

        // 7
        $partner = Partner::create([
            'name' => 'Mitra #7',
            'logo' => 'mitra_7.jpg',
            'website' => 'mitra7.id',
            'f_active' => 1,
        ]);

        // 8
        $partner = Partner::create([
            'name' => 'Mitra #8',
            'logo' => 'mitra_8.jpg',
            'website' => 'mitra8.id',
            'f_active' => 1,
        ]);

        // 9
        $partner = Partner::create([
            'name' => 'Mitra #9',
            'logo' => 'mitra_9.jpg',
            'website' => 'mitra9.id',
            'f_active' => 1,
        ]);
    }
}
