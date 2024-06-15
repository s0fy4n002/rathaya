<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Frontpage;

class FrontpageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firm = Frontpage::create([
            'mission_title1_lid'        => 'Misi Kami',
            'mission_title1_len'        => 'Our Mission',
            'mission_title2_lid'        => 'Mempertemukan Usaha Lokal dengan Institusi Pendanaan Terbaik',
            'mission_title2_len'        => 'EN Mempertemukan Usaha Lokal dengan Institusi Pendanaan Terbaik',
            'mission_decs_lid'          => 'Temukan kunci kesuksesan bagi bisnis lokal Anda dengan menggandeng institusi pendidikan terbaik. Dengan mempertemukan inovasi industri dan keunggulan akademis, kami membantu mengangkat potensi bisnis Anda ke tingkat yang baru. Jadikan kolaborasi ini sebagai langkah strategis untuk pertumbuhan dan keberlanjutan bisnis Anda.',
            'mission_decs_len'          => 'EN Temukan kunci kesuksesan bagi bisnis lokal Anda dengan menggandeng institusi pendidikan terbaik. Dengan mempertemukan inovasi industri dan keunggulan akademis, kami membantu mengangkat potensi bisnis Anda ke tingkat yang baru. Jadikan kolaborasi ini sebagai langkah strategis untuk pertumbuhan dan keberlanjutan bisnis Anda',
            'mission_image'             => 'fe-mission.png',

            'advantage_title_lid'       => 'Keunggulan Kami',
            'advantage_title_len'       => 'EN Keunggulan Kami',
            'advantage1_title_lid'      => 'Institusi Pendanaan Terpercaya',
            'advantage1_title_len'      => 'Trusted Funding Institution',
            'advantage1_desc_lid'       => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',
            'advantage1_desc_len'       => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',
            'advantage2_title_lid'      => 'Peluang Jejaring dan Akses Pasar',
            'advantage2_title_len'      => 'Networking Opportunities and Market Access',
            'advantage2_desc_lid'       => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',
            'advantage2_desc_len'       => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',
            'advantage3_title_lid'      => 'Komitmen Kami',
            'advantage3_title_len'      => 'Our Commitment',
            'advantage3_desc_lid'       => 'ID is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',
            'advantage3_desc_len'       => 'EN is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500.',

            'product_title_lid'         => 'Produk',
            'product_title_len'         => 'Products',
            'product_popular_title_lid' => 'Terpopuler',
            'product_popular_title_len' => 'Most Popular',
            'work_title_lid'            => 'Bagaimana Cara Kerja Kami',
            'work_title_len'            => 'How We Work',
            'work_image'                => 'fe-work.webp',

            'study_title_lid'           => 'Kajian Gambut',
            'study_title_len'           => 'Peat Studies',
            'study_decs_lid'            => 'ID Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet nam illo maxime enim? Quis aliquam dolore odit, animi corrupti laborum natus voluptates iusto reprehenderit sed, repellendus sunt sit. Est. ',
            'study_decs_len'            => 'EN Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet nam illo maxime enim? Quis aliquam dolore odit, animi corrupti laborum natus voluptates iusto reprehenderit sed, repellendus sunt sit. Est. ',

            'study1_title_lid'          => 'Profil Usaha',
            'study1_title_len'          => 'Business Profile',
            'study1_url'                => '#',

            'study2_title_lid'          => 'Peluang Kolaborasi',
            'study2_title_len'          => 'Collaboration Opportunities',
            'study2_url'                => '#',

            'study3_title_lid'          => 'Dampak ESG',
            'study3_title_len'          => 'ESG Impact',
            'study3_url'                => '#',

            'partner_title_lid'         => 'Mitra Kami',
            'partner_title_len'         => 'Our Partners',
            'cto_title_lid'             => 'Ayo Ciptakan Peluangmu Sendiri',
            'cto_title_len'             => 'Create Your Own Opportunities',
            'cto_button_lid'            => 'Daftar Sekarang',
            'cto_button_len'            => 'Register Now',
        ]);
    }
}
