<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enabler extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'website',
        'f_active',
    ];
}
