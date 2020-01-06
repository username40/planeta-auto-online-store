<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoEngineAttribute
 *
 * @property int $id
 * @property int $auto_engine_id
 * @property int $attribute_group_id
 * @property int $attribute_type_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute query()
 * @mixin \Eloquent
 */
class AutoEngineAttribute extends Model
{
    protected $guarded =[];

}
