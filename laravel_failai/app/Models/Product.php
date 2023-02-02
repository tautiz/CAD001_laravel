<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
