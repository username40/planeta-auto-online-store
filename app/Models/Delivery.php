<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Delivery
 *
 * @property int $id
 * @property int|null $store_id
 * @property int $day
 * @property string|null $request_deadline
 * @property string|null $delivery_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Delivery query()
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    //
}
