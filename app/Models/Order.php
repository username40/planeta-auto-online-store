<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string|null $guid Внешний идентификатор
 * @property string $status
 * @property string|null $phone Телефон
 * @property string|null $email E-Mail
 * @property string|null $delivery_address Адреса
 * @property int|null $delivery_type_id Тип доставки
 * @property int|null $payment_type_id Тип оплаты
 * @property int|null $store_id Идентификатор магазина
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderItem[] $items
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @mixin \Eloquent
 */
class Order extends Model
{
    protected $guarded = [];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
