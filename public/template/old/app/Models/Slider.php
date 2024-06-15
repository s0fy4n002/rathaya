<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_lid',
        'title_len',
        'button_lid',
        'button_len',
        'image',
        'f_active',
    ];
}
