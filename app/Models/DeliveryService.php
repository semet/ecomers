<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliveryService extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'order_id', 'city_origin_id',
        'city_destination_id', 'courier', 'service', 'cost', 'estimated_day'
    ];

    public function customer(): BelongsTo
    {
         return $this->belongsTo(Customer::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function cityOrigin(): BelongsTo
    {
         return $this->belongsTo(City::class, 'city_origin_id');
    }

    public function cityDestination(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_destination_id');
    }
}
