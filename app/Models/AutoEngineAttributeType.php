<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoEngineAttributeType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType query()
 * @mixin \Eloquent
 */
class AutoEngineAttributeType extends Model
{
    protected $guarded =[];

}
