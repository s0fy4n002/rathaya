<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Pic;

class PicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pic = Pic::create([
            'user_id' => 5,
            // 'ran' => 'uuid',
            'name' => 'Lusi Damayanti',
            'email' => 'lusiday@pcbh.com',
            'gender_id' => 2,
            'idnumber' => '1234567890123456',
            'idphoto' => 'c604c7dc-159a-41e4-8ef3-b5e3bf45e8891.jpg',
            'address' => 'Jl. Melati Wangi No. 57',
            'province_id' => '31',
            'regency_id' => '3172',
            'district_id' => '3172020',
            'village_id' => '3171020002',
            'villagename' => 'Desa Dummy',
            'verification_id' => 1,
        ]);

        $pic = Pic::create([
            'user_id' => 6,
            // 'ran' => 'uuid2',
            'name' => 'Djoko Soebekti',
            'email' => 'person2@pcbh.com',
            'gender_id' => 1,
            'idnumber' => '1234567890123457',
            'idphoto' => '59e89c9c-8be4-40b9-9c00-6f19f6791bdc2.jpg',
            'address' => 'Jl. Melati 2 Wangi No. 22',
            'province_id' => '31',
            'regency_id' => '3171',
            'district_id' => '3171020',
            'village_id' => '3171020002',
            'villagename' => 'Desa Dummy 2',
            'verification_id' => 1,
        ]);

        $pic = Pic::create([
            'user_id' => 7,
            // 'ran' => 'uuid2',
            'name' => 'Linda Manu',
            'email' => 'person3@pcbh.com',
            'gender_id' => 2,
            'idnumber' => '1234567890123458',
            'idphoto' => '77e89c9c-8be4-40b9-9c00-6f19f6791bdc3.jpg',
            'address' => 'Jl. Camplong No. 21',
            'province_id' => '31',
            'regency_id' => '3171',
            'district_id' => '3171020',
            'village_id' => '3171020002',
            'villagename' => 'Desa Camplong',
        ]);
    }
}
