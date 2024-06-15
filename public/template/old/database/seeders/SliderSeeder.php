<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #1',
            'title_len'     => 'Curate and Build opportunities1',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-1.jpg',
            'f_active'      => 1,
        ]);

        $go = Slider::create([
            'title_lid'     => 'Bersama Gerakan Fungsi Lahan Gambut',
            'title_len'     => 'Together with the Peatland Function Movement',
            'button_lid'    => 'Daftar Sekarang !',
            'button_len'    => 'Register Now !',
            'image'         => 'slider-2.jpg',
            'f_active'      => 1,
        ]);

        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #3',
            'title_len'     => 'This is Example Headline #3',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-3.jpg',
            'f_active'      => 0,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #4',
            'title_len'     => 'This is Example Headline #4',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-4.jpg',
            'f_active'      => 1,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #5',
            'title_len'     => 'This is Example Headline #5',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-5.jpg',
            'f_active'      => 0,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #6',
            'title_len'     => 'This is Example Headline #6',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-6.jpg',
            'f_active'      => 0,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #7',
            'title_len'     => 'This is Example Headline #7',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-7.jpg',
            'f_active'      => 0,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #8',
            'title_len'     => 'This is Example Headline #8',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-8.jpg',
            'f_active'      => 0,
        ]);
        $go = Slider::create([
            'title_lid'     => 'Ini Contoh Judul #9',
            'title_len'     => 'This is Example Headline #9',
            'button_lid'    => 'Daftar Sekarang',
            'button_len'    => 'Register Now',
            'image'         => 'slider-9.jpg',
            'f_active'      => 0,
        ]);
    }
}
