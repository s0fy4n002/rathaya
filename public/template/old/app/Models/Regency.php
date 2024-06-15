<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Regency extends Model
{
    use HasFactory;

    protected $table = 'mw_2kab';

    protected $fillable = [
        'id',
        'province_id',
        'name',
        'nameupper',
        'status',
    ];

    public function pics(): HasMany
    {
        return $this->hasMany(Pic::class);
    }
}
