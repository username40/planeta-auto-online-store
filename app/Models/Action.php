<?php

namespace App\Models;

use App\Models\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Page
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $page_type_id
 * @property int $user_id
 * @property int $order
 * @property string $title
 * @property string $slug
 * @property string $content
 * @property bool $archive
 * @property bool $show
 * @property \Illuminate\Support\Carbon $publicated_at
 * @property string|null $seo_title
 * @property string|null $seo_keywords
 * @property string|null $seo_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $preview_img
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePreviewImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page wherePublicatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Page whereUserId($value)
 * @property string|null $expiration_at Время окончания
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Department[] $departments
 * @property-read mixed $department_ids
 * @property-read mixed $preview_img_url
 */
class Action extends Model
{
    use Sluggable;

    protected $appends = ['department_ids', 'preview_img_url'];
    protected $guarded = ['departments', 'department_ids'];
    protected $dates = ['publicated_at', 'action_finished_at'];

    /**
     * Атрибуты, которые должны быть преобразованы к базовым типам.
     *
     * @var array
     */
    protected $casts = [
        'archive' => 'boolean',
        'show' => 'boolean',
    ];

    public function ScopeFilter() {

    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function departments() {
        return $this->belongsToMany(Department::class);
    }


    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function getDepartmentIdsAttribute()
    {
        return $this->departments()->pluck('department_id');
    }

    public function getPreviewImgUrlAttribute()
    {
        $url = null;
        if($path = $this->preview_img) {
            $url = str_replace('public', '/storage', $path);
        }
        return $url;
    }
}
