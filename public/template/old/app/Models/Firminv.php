<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Firminv extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pic_id',
        'firm_id',
        'invneed_id',
    ];

    // Firminv dimiliki oleh firm
    public function firm(): BelongsTo
    {
        return $this->belongsTo(Firm::class, 'pic_id', 'pic_id');
    }

    // Firminv dimiliki oleh invneed
    public function invneed(): BelongsTo
    {
        return $this->belongsTo(Invneed::class);
    }
}
