<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Tovercat extends Model
{
    use HasFactory;

    protected $table = 'm_tovercat';

    protected $fillable = [
        'name_lid',
        'cat_lid',
        'name_len',
        'cat_len',
        'f_active',
    ];

    // Tovercat has many firms
    public function firms(): HasMany
    {
        return $this->hasMany(Firm::class);
    }
}
