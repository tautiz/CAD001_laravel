<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $image
 * @property int $category_id
 * @property Category $category
 * @property string $color
 * @property string $size
 * @property int $price
 * @property int $status_id
 * @property Status $status
 * @property Collection $files
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const COLORS = ['Red', 'Green', 'Blue', 'Black', 'White'];
    public const SIZES  = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'color',
        'size',
        'price',
        'status_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(File::class, 'model_id', 'id')
            ->where('model_type', Product::class)
            ->whereIn('extension', File::TYPES_IMAGE);
    }

    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'model_id', 'id')
            ->where('model_type', Product::class);
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
