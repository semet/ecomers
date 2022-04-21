<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'order_number', 'customer_id', 'total_price', 'payment_status',
        'snap_token', 'courier', 'delivery_cost', 'billing_address', 'shipping_address',
        'discount', 'delivered', 'delivered_at'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function detail(): HasOne
    {
        return $this->hasOne(OrderDetail::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function deliveryService(): HasOne
    {
         return $this->hasOne(DeliveryService::class);
    }

    // public static function boot() {
    //     parent::boot();
    //     self::deleted(function($order) {
    //         $order->products()->each(function($product) {
    //             $product->delete(); // <-- direct deletion
    //         });
    //          // do the rest of the cleanup...
    //     });
    // }
}
