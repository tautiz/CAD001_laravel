<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
