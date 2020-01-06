<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AutoModel
 *
 * @property int $id
 * @property int|null $tecdoc_id
 * @property int $auto_mark_id
 * @property string $date_start
 * @property string|null $date_end
 * @property string|null $description
 * @property string|null $full_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoModification[] $modifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModel query()
 * @mixin \Eloquent
 * @property-read \App\Models\AutoMark $mark
 * @property int|null $auto_model_short_id
 */
class AutoModel extends Model
{
    protected $guarded = [];
    protected $appends = [/*'fullname']*/];

//    public function getFullnameAttribute(){
//        return $this->mark->name . ' ' . $this->description;
//    }

    public function modifications() {
        return $this->hasMany(AutoModification::class, 'auto_model_id', 'id');
    }

    public function mark() {
        return $this->hasOne(AutoMark::class, 'id', 'auto_mark_id');
    }

//    public function short(){
//        return $this->hasOne
//    }

}
