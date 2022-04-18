<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory, Uuids;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'order_id', 'status_code', 'status_message', 'transaction_id',
        'payment_type', 'transaction_time', 'transaction_status', 'fraud_status',
        'payment_code', 'pdf_url', 'finish_redirect_url'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
