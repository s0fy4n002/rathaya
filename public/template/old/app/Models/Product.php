<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pic_id',
        'name',
        'name_slug',
        'priceretailer',
        'avgsoldmonth',
        'pricewholesaler',
        'minpurchasewholesaler',
        'description_lid',
        'description_len',
        'commoditycat_id',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'f_active',
        'view',
    ];

    // Product dimiliki oleh pic
    public function pic(): BelongsTo
    {
        return $this->belongsTo(Pic::class);
        // return $this->belongsTo(Pic::class)->select(['id', 'user_id', 'name', 'province_id', 'regency_id']);
    }

    // Product dimiliki oleh pic
    public function commoditycat(): BelongsTo
    {
        return $this->belongsTo(Commoditycat::class);
        // return $this->belongsTo(Commoditycat::class)->select(['id', 'name_lid', 'name_len']);
    }

    // Product dimiliki oleh firm
    public function firm(): BelongsTo
    {
        return $this->belongsTo(Firm::class, 'pic_id', 'pic_id');
    }

    // Product memiliki provinsi melalui firm
    public function province(): BelongsTo
    {
        return $this->belongsTo(Firm::class, 'pic_id', 'pic_id');
    }

    public function province_via_firm()
    {
        return $this->hasManyThrough(Province::class, Firm::class, 'pic_id', 'id', 'id', 'province_id');
    }

    public function regency_via_firm()
    {
        return $this->hasManyThrough(Regency::class, Firm::class, 'pic_id', 'id', 'id', 'regency_id');
    }

}
