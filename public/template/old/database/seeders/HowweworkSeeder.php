<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Howwework;

class HowweworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $go = Howwework::create([
            'nu'        => '10',
            'title_lid' => 'Kurasi dan Membangun peluang1',
            'title_len' => 'Curate and Build opportunities1',
            'desc_lid'  => '1is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => '1is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 1,
        ]);
        $go = Howwework::create([
            'nu'        => '20',
            'title_lid' => 'Kurasi dan Membangun peluang2',
            'title_len' => 'Curate and Build opportunities2',
            'desc_lid'  => '2is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => '2is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 1,
        ]);
        $go = Howwework::create([
            'nu'        => '30',
            'title_lid' => 'Kurasi dan Membangun peluang3',
            'title_len' => 'Curate and Build opportunities3',
            'desc_lid'  => '3is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => '3is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 1,
        ]);
        $go = Howwework::create([
            'nu'        => '40',
            'title_lid' => 'Kurasi dan Membangun peluang4',
            'title_len' => 'Curate and Build opportunities4',
            'desc_lid'  => '4is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => '4is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
        $go = Howwework::create([
            'nu'        => '50',
            'title_lid' => 'Kurasi dan Membangun peluang5',
            'title_len' => 'Curate and Build opportunities5',
            'desc_lid'  => '5is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => '5is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
        $go = Howwework::create([
            'nu'        => '60',
            'title_lid' => '---',
            'title_len' => '---',
            'desc_lid'  => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
        $go = Howwework::create([
            'nu'        => '70',
            'title_lid' => '---',
            'title_len' => '---',
            'desc_lid'  => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
        $go = Howwework::create([
            'nu'        => '80',
            'title_lid' => '---',
            'title_len' => '---',
            'desc_lid'  => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
        $go = Howwework::create([
            'nu'        => '90',
            'title_lid' => '---',
            'title_len' => '---',
            'desc_lid'  => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'desc_len'  => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'f_active'  => 0,
        ]);
    }
}
