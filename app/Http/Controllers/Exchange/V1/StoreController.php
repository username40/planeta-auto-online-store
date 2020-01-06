<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Product;
use App\Models\Store;

class StoreController extends Controller
{
    public function update_store(StoreRequest $request) {

        $responseData = [
            'success' => false,
            'message' => 'Product guid not found'
        ];

        $product = Product::whereGuid($request->product_guid)->first();

        if ($product) {

            $product->stores()->detach();

            foreach ($request->stores as $store_arr) {
                $product->stores()->attach([Store::whereGuid($store_arr['store_guid'])->first()->id => [
                    'quantity' => $store_arr['quantity'] ?? 0,
                    'price' => $store_arr['price'] ?? 0,
                    'old_price' => $store_arr['old_price'] ?? 0,
                ]]);
            }
            $responseData = [
                'success' => true,
                'message' => 'Product store sync success'
            ];

            return response()->json($responseData);
        }
        return response()->json($responseData, 419);
    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        //
    }
}
