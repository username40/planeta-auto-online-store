<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoEngineAttributeGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup query()
 * @mixin \Eloquent
 */
class AutoEngineAttributeGroup extends Model
{
    protected $guarded =[];

}
