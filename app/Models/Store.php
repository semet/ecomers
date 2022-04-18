<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable =  [
        'seller_id', 'store_category_id', 'name', 'email', 'phone', 'address', 'active', 'photo'
    ];

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
