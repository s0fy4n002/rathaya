<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'mw_3kec';

    protected $fillable = [
        'id',
        'regency_id',
        'name',
        'nameupper',
    ];
}
