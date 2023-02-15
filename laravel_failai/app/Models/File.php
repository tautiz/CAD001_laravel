<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\File
 * @property int $id
 * @property string $path
 * @property string $url
 * @property string $name
 * @property int $size
 * @property string $extension
 * @property int $model_id
 * @property Model $model
 * @property string $model_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class File extends Model
{
    public const TYPES_IMAGE    = ['jpg', 'jpeg', 'png', 'gif', 'svg'];
    public const TYPES_DOCUMENT = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'csv', 'rtf', 'odt'];
    public const TYPES_ARCHIVE  = ['zip', 'rar', '7z', 'tar', 'gz', 'tgz', 'bz2', 'tbz2', 'xz', 'txz', 'iso', 'dmg'];
    public const TYPES_AUDIO    = ['mp3', 'wav', 'ogg', 'wma', 'aac', 'flac', 'alac'];
    public const TYPES_VIDEO    = ['mp4', 'avi', 'wmv', 'mov', 'mkv', 'flv', 'webm', 'vob', 'ogv', 'm4v', '3gp', '3g2'];

    protected $fillable = [
        'path',
        'url',
        'name',
        'size',
        'extension',
        'model_id',
        'model_type',
    ];
    public static function boot() {
        parent::boot();

        self::deleting(function ($value) {
            unlink($value->path);
        });
    }

    public function __toString()
    {
        return $this->url;
    }
}
