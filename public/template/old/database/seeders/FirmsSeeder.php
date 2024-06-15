<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Firm;

class FirmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firm = Firm::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Maju Bersama Lousee',
            'name_slug' => 'maju-bersama-lousee-1',
            'bentity_id' => 2,
            'wanumber' => '08128953393', //nomor indonesia +62
            'address' => 'Dusun Semilir 12',
            'province_id' => 14,
            'regency_id' => 1401,
            'established' => '1995',
            'area' => 50,
            'employee' => 15,
            'turnovercat_id' => 1,
            'urlweb' => 'pantaugambut.id',
            'urlmedsos' => 'facebook.com/giraffe1906',
            'urlmarket1' => 'tokopedia.com/lariztshop',
            'urlmarket2' => 'shopee.co.id/duke_pet_shope',
            'photo' => 'maju-bersama-lousee-6b441.jpg',
            'document' => 'maju-bersama-lousee-pcbh_pantaugambut-1.pdf', // 4 itu user id atau bisa 4 karakter terakhir uuid
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'verification_id' => 1,
        ]);

        $firm = Firm::create([
            'user_id' => 6,
            'pic_id' => 2,
            'name' => 'Margo Utomo',
            'name_slug' => 'margo-utomo-2',
            'bentity_id' => 1,
            'wanumber' => '08128957797', //nomor indonesia +62
            'address' => 'Jl. Banyuwangi KM 56 No. 1',
            'province_id' => 35,
            'regency_id' => 3571,
            'established' => '1807',
            'area' => 200,
            'employee' => 150,
            'turnovercat_id' => 3,
            'urlweb' => 'margoutomo.com',
            'urlmedsos' => 'facebook.com/giraffe1906',
            'urlmarket1' => 'tokopedia.com/lariztshop',
            'urlmarket2' => 'shopee.co.id/duke_pet_shope',
            'photo' => 'margo-utomo-6b441.jpg',
            'document' => 'margo-utomo-pcbh_pantaugambut-1.pdf', // 4 itu user id atau bisa 4 karakter terakhir uuid
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'verification_id' => 1,
        ]);

        $firm = Firm::create([
            'user_id' => 7,
            'pic_id' => 3,
            'name' => 'Jejak Gambut',
            'name_slug' => 'jejak_gambut-3',
            'bentity_id' => 1,
            'wanumber' => '08128957797', //nomor indonesia +62
            'address' => 'Jl. Guntur 5 No.17',
            'province_id' => 14,
            'regency_id' => 1401,
            'established' => '1807',
            'area' => 200,
            'employee' => 150,
            'turnovercat_id' => 3,
            'urlweb' => 'jejakgambut.com',
            'urlmedsos' => 'facebook.com/giraffe1906',
            'urlmarket1' => 'tokopedia.com/lariztshop',
            'urlmarket2' => 'shopee.co.id/duke_pet_shope',
            'photo' => 'jejak-gambut-42f08.jpg',
            'document' => 'jejak-gambut-pcbh_pantaugambut-1.pdf', // 4 itu user id atau bisa 4 karakter terakhir uuid
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            // 'verification_id' => 1,
        ]);
    }
}
