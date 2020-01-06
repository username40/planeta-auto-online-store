<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AttributeGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeGroup query()
 * @mixin \Eloquent
 */
	class AttributeGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AttributeType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AttributeType query()
 * @mixin \Eloquent
 */
	class AttributeType extends \Eloquent {}
}

namespace App\Models{
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
	class AutoEngine extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutoEngineAttribute
 *
 * @property int $id
 * @property int $auto_engine_id
 * @property int $attribute_group_id
 * @property int $attribute_type_id
 * @property string $name
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttribute query()
 * @mixin \Eloquent
 */
	class AutoEngineAttribute extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutoEngineAttributeGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeGroup query()
 * @mixin \Eloquent
 */
	class AutoEngineAttributeGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutoEngineAttributeType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoEngineAttributeType query()
 * @mixin \Eloquent
 */
	class AutoEngineAttributeType extends \Eloquent {}
}

namespace App\Models{
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
	class AutoMark extends \Eloquent {}
}

namespace App\Models{
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
 */
	class AutoModel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\AutoModification
 *
 * @property int $id
 * @property int|null $tecdoc_id
 * @property int $auto_model_id
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $description
 * @property string|null $full_description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ModificationAttribute[] $attributes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AutoEngine[] $engines
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AutoModification query()
 * @mixin \Eloquent
 */
	class AutoModification extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string|null $guid
 * @property string $name
 * @property int $parent_id
 * @property int $order Определяет порядок сортировки
 * @property string|null $slug
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $children
 * @property-read \App\Models\Category $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Property[] $properties
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City query()
 * @mixin \Eloquent
 * @property int $id sypexgeo ID
 * @property int $region_id ИД Региона
 * @property string $name_en Имя на английском
 * @property string $name_ru Имя на русском
 * @property float $lat Широта
 * @property float $lon Долгота
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\City whereUpdatedAt($value)
 */
	class City extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Department extends \Eloquent {}
}

namespace App{
/**
 * App\Image
 *
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property string $path Относительный путь к файлу
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Image query()
 * @mixin \Eloquent
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
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
	class ModificationAttribute extends \Eloquent {}
}

namespace App\Models{
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
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OAuthProvider
 *
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_user_id
 * @property string|null $access_token
 * @property string|null $refresh_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereProviderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereRefreshToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OAuthProvider whereUserId($value)
 */
	class OAuthProvider extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string|null $guid
 * @property int|null $xml_id
 * @property int $category_id
 * @property string|null $slug
 * @property string|null $hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Region
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $iso iso
 * @property string $country Страна
 * @property string $name_en Имя на английском
 * @property string $name_ru Имя на русском
 * @property string $timezone Временная зона
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereIso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereNameRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Region whereUpdatedAt($value)
 */
	class Region extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Specialization
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name Название
 * @property string $code Уникальный код
 * @property string $img Изображение
 * @property string $type Тип
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Specialization whereUpdatedAt($value)
 */
	class Specialization extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Store
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Store query()
 * @mixin \Eloquent
 */
	class Store extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read string $photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OAuthProvider[] $oauthProviders
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User role($roles, $guard = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property bool $status Статус
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Permission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Permission role($roles, $guard = null)
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string|null $entity
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereEntity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 */
	class Permission extends \Eloquent {}
}

namespace App{
/**
 * App\Role
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Spatie\Permission\Models\Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Role whereUpdatedAt($value)
 */
	class Role extends \Eloquent {}
}

