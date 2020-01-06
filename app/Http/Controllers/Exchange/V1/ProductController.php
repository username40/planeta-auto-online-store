<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductRequest $request)
    {
        $responseData = [
            'success' => false,
            'message' => ''
        ];

        $request->validated();
        $requestFields = $request->all();

        $brandGuid = $request['brand_guid'];
        $categoryGuid = $request['category_guid'];
        // todo: однотипные партянки
        if($brandGuid) {
            $brand = Brand::firstOrCreate(['guid' => $brandGuid]);
            $requestFields['brand_id'] = $brand->id;
        } else {
            $requestFields['brand_id'] = null;
        }
        if($categoryGuid) {
            $category = Category::firstOrCreate(['guid' => $categoryGuid]);
            $requestFields['category_id'] = $category->id;
        } else {
            $requestFields['category_id'] = null;
        }
        unset($requestFields['brand_guid']);
        unset($requestFields['category_guid']);

        $product = Product::firstOrCreate(['guid' => $request['guid']]);
        $product->fill($requestFields);
        $product->is_active = isset($request['is_active']) ? $request['is_active'] : true;
        if($product->update()) {
            $responseData['success'] = true;
            $responseData['message'] = 'Saved';
        } else {
            \Log::alert('not saved: '.var_export($requestFields), 'exchange_product_update');
        }
        return response()->json($responseData);
    }
}
