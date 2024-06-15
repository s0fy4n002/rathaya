<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Webcat;

class WebcatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $go = Webcat::create(['name' => 'Website'   , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Facebook'  , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Instagram' , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Twitter'   , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Youtube'   , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Tokopedia' , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'Shopee'    , 'f_active' => 1,]);
        $go = Webcat::create(['name' => 'OLX'       , 'f_active' => 1,]);
    }
}
