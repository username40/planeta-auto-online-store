<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Department
 *
 * @property-read \App\Models\City $city
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $city_id ИД Города
 * @property string $address Адрес (без города)
 * @property string $type Тип отделения
 * @property string|null $phone Телефон
 * @property string|null $email Email
 * @property mixed|null $schedule Расписание
 * @property mixed|null $specializations Массив ID специализаций
 * @property string|null $text HTML текст
 * @property mixed|null $photos Массив фотографии
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereSchedule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereSpecializations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department whereUpdatedAt($value)
 * @property string|null $guid
 * @property int|null $store_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $images
 * @property mixed|null $delivery_schedule Расписание доставок
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Action[] $actions
 */
class Department extends Model
{
    protected $guarded = ['city'];
    const TYPE_MARKET = 'market';
    const TYPE_SERVICE = 'service';
    //

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'model');
    }

    public function actions() {
        return $this->belongsToMany(Action::class);
    }


    protected $casts = [
        'schedule' => 'collection'
    ];
}
