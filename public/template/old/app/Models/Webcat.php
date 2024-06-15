<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Webcat extends Model
{
    use HasFactory;

    protected $table = 'm_webcat';

    protected $fillable = [
        'name',
        'f_active',
    ];

    // Webcat has many firms
    public function firms(): HasMany
    {
        return $this->hasMany(Firm::class);
    }
}
