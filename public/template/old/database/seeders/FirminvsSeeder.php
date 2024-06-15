<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Firminv;

class FirminvsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firminv = Firminv::create([
            'user_id' => 4,
            'pic_id' => 1,
            'firm_id' => 1,
            'invneed_id' => 1,
        ]);

        $firminv = Firminv::create([
            'user_id' => 4,
            'pic_id' => 1,
            'firm_id' => 1,
            'invneed_id' => 3,
        ]);
    }
}
