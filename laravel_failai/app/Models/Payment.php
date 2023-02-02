<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $order_id
 * @property int $payment_type_id
 * @property string $amount
 * @property int $status_id
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
}
