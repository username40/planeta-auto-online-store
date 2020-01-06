<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoMark
 *
 * @property int $id
 * @property int|null $tecdoc_id
 * @property string $name
 * @property string|null $description
 * @property string|null $matchcode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoModel[] $models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoMark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoMark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoMark query()
 * @mixin \Eloquent
 */
class AutoMark extends Model
{
    protected $guarded = [];

    public function models() {
        return $this->hasMany(AutoModel::class, 'auto_mark_id', 'id');
    }
}
