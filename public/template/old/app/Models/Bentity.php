<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Bentity extends Model
{
    use HasFactory;

    protected $table = 'm_bentity';

    protected $fillable = [
        'name_lid',
        'nameshort_lid',
        'name_len',
        'nameshort_len',
        'f_active',
    ];

    // Bentity has many firms
    public function firms(): HasMany
    {
        return $this->hasMany(Firm::class);
    }
}
