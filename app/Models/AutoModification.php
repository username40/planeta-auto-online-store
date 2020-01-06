<?php

namespace App\Models;

use App\Models\Prefilter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\AutoModification
 *
 * @property int $id
 * @property int|null $tecdoc_id
 * @property int $auto_model_id
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $description
 * @property string|null $full_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModificationAttribute[] $attributes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoEngine[] $engines
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification query()
 * @mixin \Eloquent
 * @property-read \App\Models\AutoModel $model
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property int|null $xml_auto_id ИД авто из xml
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Prefilter[] $prefilter
 */
class AutoModification extends Model
{
    protected $guarded = [];

    public function attributes() {
        return $this->hasMany(ModificationAttribute::class, 'auto_modification_id', 'id');
    }

    public function engines() {
        return $this->belongsToMany(AutoEngine::class, 'auto_engine_auto_modification', 'auto_modification_id', 'auto_engine_id');
    }

    public function model() {
        return $this->hasOne(AutoModel::class, 'id', 'auto_model_id');
    }

//    public function properties_by_category($category_id) {
//        $category = Category::findOrFail($category_id);
//
//        return $this->hasManyThrough()
//    }

    /**
     * @param Category $category
     * @return Collection
     */
    public function predFilteredProducts(Category $category) {
        return $this->products()
            ->where('category_id', $category->id)
            ->get();
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'modification_product',  'product_id','modification_id');
    }

    public function prefilter() {
        return $this->hasMany(Prefilter::class);
    }


}
