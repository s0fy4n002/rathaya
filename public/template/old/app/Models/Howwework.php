<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Howwework extends Model
{
    use HasFactory;

    protected $fillable = [
        'nu',
        'title_lid',
        'title_len',
        'desc_lid',
        'desc_len',
        'f_active',
    ];
}
