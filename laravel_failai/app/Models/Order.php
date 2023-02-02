<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property int $shipping_address_id
 * @property Address $shippingAddress
 * @property int $billing_address_id
 * @property Address $billingAddress
 * @property Collection<Payment> $payments
 * @property int $status_id
 * @property Status $status
 * @property Collection<Product> $products
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model
{
    use HasFactory;

    protected  $guarded = [
        'status_id',
        'payment_id',
        'user_id',
    ];

    protected $fillable = [
        'shipping_address_id',
        'billing_address_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(
            Product::class,
            OrderDetails::class,
            'order_id',
            'id',
            'id',
            'product_id'
        );

//      Alternatyva:
//
//        return $this->hasMany(Product::class, 'id', 'product_id')
//            ->join('order_details', 'products.id', '=', 'order_details.product_id')
//            ->where('order_details.order_id', $this->id);
    }
}
