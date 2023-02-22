<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $role
 * @property string $remember_token
 * @property Person $person
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    public const ROLE_ADMIN   = 'admin';
    public const ROLE_USER    = 'user';
    public const ROLE_MANAGER = 'manager';
    public const ROLE_PM      = 'prod_manager';

    public const ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_USER,
        self::ROLE_MANAGER,
        self::ROLE_PM,
    ];

    public const ROLE_DEFAULT = self::ROLE_USER;


    protected $guarded = [
        'role',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function person(): HasOne
    {
        return $this->hasOne(Person::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function getInitials(): string
    {
        $parts    = explode(' ', $this->person);
        $initials = '';
        foreach ($parts as $part) {
            $initials .= mb_substr($part, 0, 1);
        }
        return $initials;
    }

    public function getLatestCart(): Order
    {
        $status = Status::where(['name' => Order::STATUS_NEW, 'type' => 'order'])->first();

        $order = $this?->orders()?->where('status_id', $status->id)?->latest()?->first();

        if (!isset($order) || !$order instanceof Order) {
            $order = new Order();
            $order->user_id = $this->id;
            $order->status_id = $status->id;
            $order->save();
        }

//        $order = Order::firstOrCreate(['status_id', $status->id, 'user_id' => $this->id]);

        return $order ?? new Order();
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isManager(): bool
    {
        return $this->role === self::ROLE_MANAGER;
    }

    public function isPM(): bool
    {
        return $this->role === self::ROLE_PM;
    }

    public function isPersonnel(): bool
    {
        return in_array($this->role, [self::ROLE_ADMIN, self::ROLE_MANAGER, self::ROLE_PM]);
    }

    public function __toString(): string
    {
        return '[' . $this->name . '] ' . $this->person;
    }
}
