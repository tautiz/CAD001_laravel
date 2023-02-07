<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $personal_code
 * @property string $email
 * @property string $phone
 * @property int $user_id
 * @property User $user
 * @property int $address_id
 * @property Address $address
 * @property string $created_at
 * @property string $updated_at
 */
class Person extends Model
{
    use HasFactory;

    protected $guarded = [
        'address_id',
    ];

    protected $fillable = [
        'name',
        'surname',
        'personal_code',
        'email',
        'phone',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
