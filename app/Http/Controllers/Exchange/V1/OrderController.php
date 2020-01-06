<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::with(['items.product:id,guid,name'])->orderByDesc('id')->get();
        return response()->json($orders);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json($order);
    }
}
