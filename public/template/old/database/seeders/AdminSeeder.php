<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Admin User 1
        $admin = User::create([
            'ran' => Str::uuid(),
            'name' => 'Super User',
            'email' => 'my_jeffry@yahoo.com',
            'password' => Hash::make('ottowcakep'),
            'avatar' => '1.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
        ]);
        $admin->assignRole('Admin');

        // Creating Staff User 2
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Iola Abas',
            'email' => 'staff1@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '2.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
        ]);
        $staff->assignRole('Staff');

        // Creating Staff User 3
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Agiel Prakoso',
            'email' => 'staff2@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '3.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
        ]);
        $staff->assignRole('Staff');

        // Creating Staff User 4
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Ricky Amukti',
            'email' => 'staff3@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '4.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
        ]);
        $staff->assignRole('Staff');

        // Creating Member User 5-1 - pic - firm - product
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Lusi Day',
            'email' => 'person1@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '5.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 6-2 - pic - firm
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Soebekti',
            'email' => 'person2@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '6.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 7-3 - pic
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Linda M',
            'email' => 'person3@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '7.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 8
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Bagia Suhartono',
            'email' => 'person4@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 9
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Tia K',
            'email' => 'person5@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '5.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 10
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Tono Suratno',
            'email' => 'person6@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 11
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Flora J',
            'email' => 'person7@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '7.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 12
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Member 8',
            'email' => 'person8@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '8.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 13
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Member 9',
            'email' => 'person9@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'avatar' => '9.jpg',
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
            'phone_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 14
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Sigit Hakim',
            'email' => 'person10@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
        ]);
        $staff->assignRole('Member');

        // Creating Member User 15
        $staff = User::create([
            'ran' => Str::uuid(),
            'name' => 'Kurniawan K',
            'email' => 'person11@pcbh.com',
            'password' => Hash::make('demodemo123'),
            'email_verified_at' => '2000-01-01 01:01:01',
            'profile_verified' =>1,
        ]);
        $staff->assignRole('Member');
    }
}
