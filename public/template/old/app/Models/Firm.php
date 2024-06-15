<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Firm extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pic_id',
        'name',
        'name_slug',
        'bentity_id',
        'wanumber',
        'address',
        'province_id',
        'regency_id',
        'established',
        'area',
        'employee',
        'turnovercat_id',
        'urlweb',
        'urlmedsos',
        'urlmarket1',
        'urlmarket2',
        'photo',
        'document',
        'description_lid',
        'description_len',
        'verification_id',
        'view',
    ];

    public function user(): BelongsTo
    {
        // return $this->belongsTo(User::class);
        return $this->belongsTo(User::class)->select(['id', 'name', 'email']);
    }

    // one to one from pic
    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class);
        // return $this->belongsTo(Pic::class)->select(['id', 'user_id','name']);
    }

    public function bentity(): BelongsTo
    {
        // return $this->belongsTo(Bentity::class);
        return $this->belongsTo(Bentity::class)->select(['id', 'name_lid', 'name_len']);
    }

    public function tovercat(): BelongsTo
    {
        // return $this->belongsTo(Tovercat::class);
        return $this->belongsTo(Tovercat::class, 'turnovercat_id', 'id')->select(['id', 'name_lid', 'name_len']);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
        // return $this->belongsTo(Province::class)->select(['id', 'name']);
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
        // return $this->belongsTo(Regency::class)->select(['id', 'name']);
    }

    // Firm has many products
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'pic_id', 'pic_id');
    }

    // Firm has many firminv
    public function firminvs(): HasMany
    {
        return $this->hasMany(Firminv::class, 'pic_id', 'pic_id');
    }

}
