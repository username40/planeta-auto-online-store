<?php

namespace App\Http\Controllers\Site;
use App\Models\Product;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use \Illuminate\Database\Eloquent\Builder;

class ProductController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Product($attributes);
    }
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
        $itemsQuery
            ->with(['category:id,name', 'images:id,model_id,model_type,path'])
            ->select(['id', 'name', 'article', 'category_id']);

        if ($request->has('category_id')) {
            $categoryId = $request->category_id;
            $itemsQuery->whereHas('category', function (Builder $q) use ($categoryId) {
                $q->where('id', $categoryId);
                $q->orWhere('parent_id', $categoryId);
            });
        }
        return response()->json($itemsQuery->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $visible = [
            'id',
            'name',
            'article',
            'properties',
            'description',
            'category',
            'images',
            'price',
            'availableStoresId'
        ];
        $product
            ->setVisible($visible)
            ->load(['category:id,name', 'images:id,model_id,model_type,path']);
        return response()->json($product);
    }

    public function stores($product_id) {
        $product = Product::find($product_id);

        # get all stores with pvz
        $store_list = Store::where('is_pvz', true)->get();


        if ($product) {
            if ($product->stores()->whereGuid('31842b9d-5184-11e7-80c5-3c4a92f7bc30')->count() != 0) {

                # Товар есть на ЦС. Отлично, работаем дальше

                $stores = $store_list
                    ->merge(
                        $product->stores()
                            ->where('is_pvz', true)
                            ->get()
                    );

            } else {


                $stores = $product->stores()
                    ->where('is_pvz', true)
                    ->get();

            }


            foreach($stores as $store) {

                if (!$store->pivot) {

                    # Если товара нет в наличии, считаем время доставки с ЦС

                    $nearest_delivery_request = $this->calculate_nearest_delivery_request($store);

                    $nearest_delivery_time = $this->calculate_nearest_delivery_time($store, $nearest_delivery_request);

                    $arr_days = [
                        'в понедельник',
                        'во вторник',
                        'в среду',
                        'в четверг',
                        'в пятницу',
                        'в субботу',
                        'в воскресенье',
                    ];

                    $day = $nearest_delivery_time->first()['day'];


                    $delivery_text = (now()->dayOfWeek - 1 - $nearest_delivery_time->first()['day']) == -1 ?
                        'завтра после ' . $nearest_delivery_time->first()['hour'] . ':00' :
                        $arr_days[$day];

                    $store->delivery_time = $delivery_text;

                } else {
                    $store->delivery_time = "через 30 минут";
                }
            }

//            dump($stores);
            $sorted_stores = $stores->sortByDesc('delivery_time')->values()->all();

            return response()->json($sorted_stores);
        } else {
            return response()->json([]);
        }
    }

    protected function calculate_nearest_delivery_request(Store $store): \Illuminate\Support\Collection {

        $now = now()->timezone('Asia/Yekaterinburg');
        $dayToday = (clone $now)->dayOfWeek - 1;
        $day_1 = ($dayToday + 1) > 6 ?
            $dayToday + 1 -6 :
            $dayToday + 1;
        $day_2 = ($dayToday + 2) > 6 ?
            $dayToday + 2 -6 :
            $dayToday + 2;

        $nearest_delivery_request = $store->delivery_schedule
            ->where('day', $dayToday)
            ->where('type', 'request')
            ->where('hour', '>=', $now->hour + 1);

        if (!$nearest_delivery_request->first()) {
            $nearest_delivery_request = $store->delivery_schedule
                ->where('day', $day_1)
                ->where('type', 'request');

            if (!$nearest_delivery_request->first()) {
                $nearest_delivery_request = $store->delivery_schedule
                    ->where('day', $day_2)
                    ->where('type', 'request');
            }
        }

        return $nearest_delivery_request;
    }

    protected function calculate_nearest_delivery_time(Store $store, $nearest_delivery_request) {
        $now = now()->timezone('Asia/Yekaterinburg');
        $dayToday = (clone $now)->dayOfWeek - 1;
        $day_1 = ($dayToday + 1) > 6 ?
            $dayToday + 1 -6 :
            $dayToday + 1;
        $day_2 = ($dayToday + 2) > 6 ?
            $dayToday + 2 -6 :
            $dayToday + 2;
        $day_3 = ($dayToday + 3) > 6 ?
            $dayToday + 3 -6 :
            $dayToday + 3;

        $nearest_delivery_time = $store->delivery_schedule
            ->where('day', $day_1)
            ->where('type', 'delivery')
            ->where('hour', '>', $nearest_delivery_request->first()['hour']);

        if ($nearest_delivery_time->first() == null) {
            $nearest_delivery_time = $store->delivery_schedule
                ->where('day', $day_2)
                ->where('type', 'delivery');
            if ($nearest_delivery_time->first() == null) {
                $nearest_delivery_time = $store->delivery_schedule
                    ->where('day', $day_3)
                    ->where('type', 'delivery');

            }
        }

        return $nearest_delivery_time;
    }
}
