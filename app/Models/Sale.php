<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    protected $fillable = [
        'seller_id',
        'date',
        'amount',
    ];

    public function seller() : BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }
}
