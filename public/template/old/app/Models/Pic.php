<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo; // a user
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'gender_id',
        'idnumber',
        'idphoto',
        'address',
        'province_id',
        'regency_id',
        'district_id',
        'village_id',
        'villagename',
        'verification_id',
        'view',
    ];

    // one to one from user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // PIC has many products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // PIC has one Firm
    public function firm(): HasOne
    {
        return $this->hasOne(Firm::class);
    }

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

}
