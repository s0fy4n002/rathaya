<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'mission_title1_lid',
        'mission_title1_len',
        'mission_title2_lid',
        'mission_title2_len',
        'mission_decs_lid',
        'mission_decs_len',
        'mission_image',

        'advantage_title_lid',
        'advantage_title_len',
        'advantage1_title_lid',
        'advantage1_title_len',
        'advantage1_desc_lid',
        'advantage1_desc_len',
        'advantage2_title_lid',
        'advantage2_title_len',
        'advantage2_desc_lid',
        'advantage2_desc_len',
        'advantage3_title_lid',
        'advantage3_title_len',
        'advantage3_desc_lid',
        'advantage3_desc_len',

        'product_title_lid',
        'product_title_len',
        'product_popular_title_lid',
        'product_popular_title_len',

        'work_title_lid',
        'work_title_len',
        'work_image',

        'study_title_lid',
        'study_title_len',
        'study_decs_lid',
        'study_decs_len',

        'study1_title_lid',
        'study1_title_len',
        'study1_url',

        'study2_title_lid',
        'study2_title_len',
        'study2_url',

        'study3_title_lid',
        'study3_title_len',
        'study3_url',

        'partner_title_lid',
        'partner_title_len',

        'cto_title_lid',
        'cto_title_len',
        'cto_button_lid',
        'cto_button_len',
    ];
}
