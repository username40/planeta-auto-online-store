<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $name
 * @property string|null $unit Единица измерения
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Property query()
 * @mixin \Eloquent
 * @property string $guid
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyValue[] $values
 * @property int $use_analog
 * @property int $use_filter
 * @property string $type
 */
class Property extends Model
{
    const ID_TIRE_HEIGHT = 16;
    const ID_TIRE_WIDTH = 17;
    const ID_TIRE_DIAMETER = 40;
    const ID_TIRE_CONSTRUCTION = 25;

    public static $requiredTireIds = [
        self::ID_TIRE_WIDTH,
        self::ID_TIRE_HEIGHT,
        self::ID_TIRE_DIAMETER,
//        self::ID_TIRE_CONSTRUCTION,
    ];

    protected $guarded = [];

    public function values() {
        return $this->hasMany(PropertyValue::class, 'property_id', 'id');
    }
}
