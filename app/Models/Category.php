<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string|null $guid
 * @property string $name
 * @property int $parent_id
 * @property int $order Определяет порядок сортировки
 * @property string|null $slug
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @mixin \Eloquent
 * @property string|null $description Описание
 * @property int|null $is_acive
 * @property bool|null $is_active
 */
class Category extends Model
{
    CONST ID_TIRE = 21;
    protected $guarded = [];

    public function parent() {
        return $this->hasOne(Category::class, 'id', 'parent_id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function properties() {
        return $this->belongsToMany(Property::class, 'category_property');
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
