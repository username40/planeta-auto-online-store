<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AttributeType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType query()
 * @mixin \Eloquent
 */
class AttributeType extends Model
{
    protected $guarded =[];
}
