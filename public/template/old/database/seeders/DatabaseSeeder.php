<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            GendersSeeder::class,
            BentitiesSeeder::class,
            TovercatsSeeder::class,
            InvneedsSeeder::class,
            CommoditycatsSeeder::class,

            PicSeeder::class,
            FirmsSeeder::class,
            FirminvsSeeder::class,
            ProductsSeeder::class,
            EnablersSeeder::class,
            PartnersSeeder::class,

            FrontpageSeeder::class,
            HowweworkSeeder::class,
            SliderSeeder::class,
            WebcatSeeder::class,
        ]);
    }
}
