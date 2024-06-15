<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Commoditycat;

class CommoditycatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comm = Commoditycat::create([ // 1
            'name_lid' => 'Pertanian - Coklat',
            'name_len' => 'Agriculture - Cacao',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 2
            'name_lid' => 'Pertanian - Kopi',
            'name_len' => 'Agriculture - Coffee',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 3
            'name_lid' => 'Pertanian - Lainnya',
            'name_len' => 'Agriculture - Other',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 4
            'name_lid' => 'Ekonomi Bergulir',
            'name_len' => 'Circular Economy',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 5
            'name_lid' => 'Konstruksi',
            'name_len' => 'Construction',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 6
            'name_lid' => 'Kerajinan Tangan',
            'name_len' => 'Craft',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 7
            'name_lid' => 'Energi',
            'name_len' => 'Energy',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 8
            'name_lid' => 'Kehutanan',
            'name_len' => 'Forestry',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 9
            'name_lid' => 'Herbal & Kesehatan',
            'name_len' => 'Herbal & Wellness',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 10
            'name_lid' => 'Solusi Basis Alam',
            'name_len' => 'Nature Base Solution',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 11
            'name_lid' => 'Pariwisata',
            'name_len' => 'Tourism',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 12
            'name_lid' => 'Manajemen Limbah',
            'name_len' => 'Waste Management',
            'f_active' => 1,
        ]);

        $comm = Commoditycat::create([ // 13
            'name_lid' => 'Afolu',
            'name_len' => 'Afolu',
            'f_active' => 1,
        ]);
    }
}
