<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AttributeGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup query()
 * @mixin \Eloquent
 */
class AttributeGroup extends Model
{
    protected $guarded = [];
}
