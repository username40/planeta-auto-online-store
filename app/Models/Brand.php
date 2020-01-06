<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Brand query()
 * @mixin \Eloquent
 * @property string $guid ИД 1с
 * @property bool $is_active Активный
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 */
class Brand extends Model
{
    protected $guarded = [];

    public function images() {
        return $this->morphMany(Image::class, 'model');
    }
    /**
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
