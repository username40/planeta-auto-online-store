<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoModelShort
 *
 * @property int $id
 * @property string $name
 * @property string $full_name
 * @property int $auto_mark_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoModification[] $auto_modifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModelShort newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModelShort newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModelShort query()
 * @mixin \Eloquent
 */
class AutoModelShort extends Model
{
    protected $guarded = [];

    public function auto_modifications() {
        return $this->hasManyThrough(
            AutoModification::class,
            AutoModel::class,
            'auto_model_short_id',
            'auto_model_id',
            'id',
            'id'
        );
    }
}
