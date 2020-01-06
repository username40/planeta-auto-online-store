<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store query()
 * @mixin \Eloquent
 * @property string|null $guid
 * @property int $is_pvz Является ли пунктом выдачи заказов
 * @property \Illuminate\Support\Collection|null $schedule Расписание
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property \Illuminate\Support\Collection|null $delivery_schedule Расписание доставок
 */
class Store extends Model
{
    protected $guarded = [];

    protected $casts = [
        'schedule' => 'collection',
        'delivery_schedule' => 'collection',
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
