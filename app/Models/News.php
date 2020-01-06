<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\News
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News query()
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
 * @property string|null $preview_img
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News wherePageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News wherePreviewImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News wherePublicatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSeoKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\News whereUserId($value)
 */
class News extends Model
{
    use Sluggable;

    protected $guarded = [];
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

    protected $filters = [
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


    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
