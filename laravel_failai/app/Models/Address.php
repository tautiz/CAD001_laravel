<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $city
 * @property string $zip
 * @property string $street
 * @property string $house_number
 * @property string $apartment_number
 * @property string $state
 * @property string $type
 * @property string $additional_info
 * @property int $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Address extends Model
{
    use HasFactory;
}
