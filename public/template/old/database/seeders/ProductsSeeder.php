<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee',
            'name_slug' => 'cokelat_lousee-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee-6b441.jpg',
            'photo2' => 'cokelat-lousee-6b442.jpg',
            'photo3' => 'cokelat-lousee-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);

        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee2',
            'name_slug' => 'cokelat_lousee2-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee2-6b441.jpg',
            'photo2' => 'cokelat-lousee2-6b442.jpg',
            'photo3' => 'cokelat-lousee2-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);

        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee3',
            'name_slug' => 'cokelat_lousee3-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee3-6b441.jpg',
            'photo2' => 'cokelat-lousee3-6b442.jpg',
            'photo3' => 'cokelat-lousee3-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);

        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee4',
            'name_slug' => 'cokelat_lousee4-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee4-6b441.jpg',
            'photo2' => 'cokelat-lousee4-6b442.jpg',
            'photo3' => 'cokelat-lousee4-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);

        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee5',
            'name_slug' => 'cokelat_lousee5-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee5-6b441.jpg',
            'photo2' => 'cokelat-lousee5-6b442.jpg',
            'photo3' => 'cokelat-lousee5-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);

        $prod = Product::create([
            'user_id' => 5,
            'pic_id' => 1,
            'name' => 'Cokelat Lousee6',
            'name_slug' => 'cokelat_lousee6-511234',
            'priceretailer' => 10000,
            'avgsoldmonth' => 100,
            'pricewholesaler' => 9500,
            'minpurchasewholesaler' => 1000,
            'description_lid' => 'ID Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'description_len' => 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at tincidunt lacus, ut consectetur nisl. Sed id arcu et dui dictum fringilla. Phasellus varius placerat sem, quis malesuada magna maximus aliquam. Mauris in egestas nulla. Aliquam nibh libero, convallis eget lectus nec, dapibus faucibus enim. Donec semper turpis vitae ante iaculis, et consequat eros pellentesque. Quisque non vehicula lectus. Maecenas efficitur magna justo, non venenatis felis laoreet non. Suspendisse semper tincidunt rutrum. Ut luctus rhoncus neque, non ultricies justo pulvinar',
            'commoditycat_id' => 1,
            'photo1' => 'cokelat-lousee6-6b441.jpg',
            'photo2' => 'cokelat-lousee6-6b442.jpg',
            'photo3' => 'cokelat-lousee6-6b443.jpg',
            // 'photo4' => 'prod4.jpg',
            // 'photo5' => 'prod5.jpg',
            'f_active' => 1,
        ]);
    }
}
