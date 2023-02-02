<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $order_id
 * @property string $product_name
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property int $status_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class OrderDetails extends Model
{
    use HasFactory;

    protected $guarded = [
        'price',
        'status_id',
    ];

    protected $fillable = [
        'order_id',
        'product_name',
        'product_id',
        'quantity',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
