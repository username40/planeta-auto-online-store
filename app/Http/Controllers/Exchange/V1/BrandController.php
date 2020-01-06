<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(BrandRequest $request)
    {
        $responseData = [
            'success' => false,
            'message' => ''
        ];
        $request->validated();
        $requestFields = $request->all();
        $model = Brand::firstOrCreate(['guid' => $request['guid']]);
        $model->fill($requestFields);
        $model->is_active = isset($request['is_active']) ? $request['is_active'] : true;
        if($model->update()) {
            $responseData['success'] = true;
            $responseData['message'] = 'Saved';
        } else {
            \Log::alert('not saved: '.var_export($requestFields), 'exchange_brand_update');
        }
        return response()->json($responseData);
    }
}
