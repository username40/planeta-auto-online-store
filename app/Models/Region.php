<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Region
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $iso iso
 * @property string $country Страна
 * @property string $name_en Имя на английском
 * @property string $name_ru Имя на русском
 * @property string $timezone Временная зона
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereUpdatedAt($value)
 */
class Region extends Model
{
    //
}
