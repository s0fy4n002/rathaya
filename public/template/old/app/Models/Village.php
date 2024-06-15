<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $table = 'mw_4kel';

    protected $fillable = [
        'id',
        'district_id',
        'name',
        'nameupper',
    ];
}
