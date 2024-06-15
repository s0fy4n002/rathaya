<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Invneed extends Model
{
    use HasFactory;

    protected $table = 'm_invneed';

    protected $fillable = [
        'name_lid',
        'name_len',
        'f_active',
    ];

    public function firminvs(): HasMany
    {
        return $this->hasMany(Firminv::class);
    }
}
