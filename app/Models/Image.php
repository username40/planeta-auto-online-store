<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Image
 *
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property string $path Относительный путь к файлу
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @mixin \Eloquent
 * @property string|null $guid
 * @property string|null $name
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 */
class Image extends Model
{
    protected $guarded = [];
    protected $appends = ['url'];
    protected $hidden = ['model_id', 'model_type'];

    const MODEL_TYPE_PRODUCT = 'Product';
    const MODEL_TYPE_BRAND = 'Brand';
    public static $types = [
        self::MODEL_TYPE_PRODUCT,
        self::MODEL_TYPE_BRAND,
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute() {
        $url = null;
        if(!empty($this->path)) {

            $url = str_replace('/public', '/storage', $this->path);
        }
        return $url;
    }
}
