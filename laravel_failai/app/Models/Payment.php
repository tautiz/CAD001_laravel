<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property Order $order
 * @property int $payment_type_id
 * @property PaymentType $type
 * @property string $amount
 * @property int $status_id
 * @property Status $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Payment extends Model
{
    use HasFactory;

    protected $guarded = [
        'status_id',
    ];

    protected $fillable = [
        'order_id',
        'payment_type_id',
        'amount',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
