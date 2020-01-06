<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

/**
 * App\PropertyValue
 *
 * @property int $id
 * @property int $property_id
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PropertyValue query()
 * @mixin \Eloquent
 * @property-read \App\Models\Property $property
 */
class PropertyValue extends Model
{
    protected $guarded = [];

    public function property() {
        return $this->hasOne(Property::class, 'id', 'property_id');
    }
}
