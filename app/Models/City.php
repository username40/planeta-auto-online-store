<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City query()
 * @mixin \Eloquent
 * @property int $id sypexgeo ID
 * @property int $region_id ИД Региона
 * @property string $name_en Имя на английском
 * @property string $name_ru Имя на русском
 * @property float $lat Широта
 * @property float $lon Долгота
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereUpdatedAt($value)
 */
class City extends Model
{
    //
}
