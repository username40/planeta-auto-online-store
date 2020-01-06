<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Prefilter
 *
 * @property int $id
 * @property int $category_id
 * @property int $modification_id
 * @property int $property_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prefilter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prefilter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Prefilter query()
 * @mixin \Eloquent
 * @property int $property_value_id ИД значение фильтра
 * @property int $auto_modification_id
 */
class Prefilter extends Model
{
    //
}
