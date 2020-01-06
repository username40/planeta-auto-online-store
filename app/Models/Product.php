<?php

namespace App\Models;

use App\Search\Searchable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $guid
 * @property int|null $xml_id
 * @property int $category_id
 * @property string|null $slug
 * @property string|null $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @mixin \Eloquent
 * @property int|null $brand_id Ид бренда
 * @property bool $is_active Активный
 * @property string|null $description Описание
 * @property string|null $name Наименование
 * @property int|null $model_id Ид модели
 * @property string|null $code
 * @property string|null $article
 * @property string|null $market_id
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection $available_stores_id
 * @property-read \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection $properties
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyValue[] $property_values
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Store[] $stores
 * @property-read mixed $articul
 * @property-read mixed $price
 */
class Product extends Model
{
    use Searchable;
    protected $appends = ['properties', 'availableStoresId', 'price', 'articul'];
    protected $guarded = [];

    protected $hidden = ['category_id'];
    protected $public_path = '/uploads/products';

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function images() {
        return $this->morphMany(Image::class, 'model');
    }

    public function property_values() {
        return $this->belongsToMany(PropertyValue::class, 'product_property_value',  'product_id', 'property_value_id');
    }

    public function stores() {
        return $this->belongsToMany(Store::class)
            ->withPivot('quantity', 'price', 'old_price');
    }

    /**
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getPropertiesAttribute() {
        $resultProperties = collect();

        $propertyValues = $this->property_values;
        foreach ($propertyValues as $propertyValue) {
            $property = $propertyValue->property;
            if($propertyValue->property_id == $property->id) {
                $resultProperties->add([
                    'value_id' => $propertyValue->id,
                    'property_id' => $property->id,
                    'name' => $property->name,
                    'value' => $propertyValue->value
                ]);
            }
        }
        return $resultProperties;
    }

    /**
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public function getAvailableStoresIdAttribute() {

        return collect(
            $this
            ->stores()
            ->where('is_pvz', true)
            ->get()
            ->pluck('id' )
        );
    }

    public function getArticulAttribute() {
        return $this->article;
    }

    public function getPriceAttribute() {

        if ($this->stores()->count() > 0) {
            return $this
                ->stores()
                ->first()
                ->pivot
                ->price;
        } else {
            return 0;
        }
    }

    /**
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean'
    ];
}
