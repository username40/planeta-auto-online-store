<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        $response = [];
        $request->validated();
        $order_data = [
            'email' => $request->email,
            'phone' => $request->phone,
        ];
        $order = Order::create($order_data);
        $items = [];
        if($order) {
            foreach ($request->items as $order_item) {
                $item = new \App\Models\OrderItem($order_item);
                $item->price = $item->product->price;
                $items[] = $item;
            }
            $order->items()->saveMany($items);
            $response = ['order' => ['id' => $order->id]];
        }

        return response()->json($response);
    }
}
