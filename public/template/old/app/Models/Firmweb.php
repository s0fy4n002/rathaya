<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Firmweb extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pic_id',
        'firm_id',
        'webcat_id',
        'fullurl',
    ];

    // Firmweb dimiliki oleh firm
    public function firm(): BelongsTo
    {
        return $this->belongsTo(Firm::class, 'pic_id', 'pic_id');
    }

    // Firmweb dimiliki oleh webcat
    public function webcat(): BelongsTo
    {
        return $this->belongsTo(Webcat::class);
    }
}
