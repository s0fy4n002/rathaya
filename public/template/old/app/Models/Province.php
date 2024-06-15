<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $table = 'mw_1prv';

    protected $fillable = [
        'id',
        'name',
        'nameupper',
        'short',
        'f_pg',
    ];

    public function firms(): HasMany
    {
        return $this->hasMany(Firm::class);
    }

    public function pics(): HasMany
    {
        return $this->hasMany(Pic::class);
    }

}
