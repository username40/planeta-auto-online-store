<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoEngine
 *
 * @property int $id
 * @property int|null $tecdoc_id
 * @property string $name
 * @property string|null $description
 * @property string|null $full_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoEngineAttribute[] $attributes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoModification[] $modifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngine query()
 * @mixin \Eloquent
 */
class AutoEngine extends Model
{
    protected $guarded =[];

    public function attributes() {
        return $this->hasMany(AutoEngineAttribute::class, 'auto_engine_id', 'id');
    }

    public function modifications() {
        return $this->belongsToMany(AutoModification::class, 'auto_engine_auto_modification', 'auto_engine_id', 'auto_modification_id');
    }
}
