<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ModificationAttribute
 *
 * @property int $id
 * @property int $auto_modification_id
 * @property int $attribute_group_id
 * @property int $attribute_type_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AttributeGroup $group
 * @property-read \App\Models\AttributeType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ModificationAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ModificationAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ModificationAttribute query()
 * @mixin \Eloquent
 */
class ModificationAttribute extends Model
{
    protected $guarded = [];

    public function type() {
        return $this->hasOne(AttributeType::class, 'id', 'attribute_type_id');
    }

    public function group() {
        return $this->hasOne(AttributeGroup::class, 'id', 'attribute_group_id');
    }
}
