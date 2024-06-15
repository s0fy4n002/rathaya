<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commoditycat extends Model
{
    use HasFactory;

    protected $table = 'm_commoditycat';

    protected $fillable = [
        'name_lid',
        'name_len',
        'f_active',
    ];

    // Commoditycat has many products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
