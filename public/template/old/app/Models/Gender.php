<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Gender extends Model
{
    use HasFactory;

    protected $table = 'm_gender';

    protected $fillable = [
        'name_lid',
        'name_len',
        'f_active',
    ];

    public function pics(): HasMany
    {
        return $this->hasMany(Pic::class);
    }
}
