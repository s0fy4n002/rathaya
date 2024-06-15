<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Enabler;

class EnablersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enabler = Enabler::create([ 'name' => 'Enabler #01',  'logo' => 'enabler_1.jpg',  'website' => 'enabler1.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #02',  'logo' => 'enabler_2.jpg',  'website' => 'enabler2.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #03',  'logo' => 'enabler_3.jpg',  'website' => 'enabler3.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #04',  'logo' => 'enabler_4.jpg',  'website' => 'enabler4.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #05',  'logo' => 'enabler_5.jpg',  'website' => 'enabler5.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #06',  'logo' => 'enabler_6.jpg',  'website' => 'enabler6.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #07',  'logo' => 'enabler_7.jpg',  'website' => 'enabler7.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #08',  'logo' => 'enabler_8.jpg',  'website' => 'enabler8.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #09',  'logo' => 'enabler_9.jpg',  'website' => 'enabler9.id'   , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #10',  'logo' => 'enabler_10.jpg', 'website' => 'enabler10.id'  , 'f_active' => 1, ]);
        $enabler = Enabler::create([ 'name' => 'Enabler #11',  'logo' => 'enabler_11.jpg', 'website' => 'enabler11.id'  , 'f_active' => 0, ]);
    }
}
