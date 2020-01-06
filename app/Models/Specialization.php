<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Specialization
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name Название
 * @property string $code Уникальный код
 * @property string $img Изображение
 * @property string $type Тип
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereUpdatedAt($value)
 */
class Specialization extends Model
{
    protected $guarded = [];
    //
}
