<?php

namespace App\Http\Controllers\Exchange\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CategoryRequest $request)
    {
        $responseData = [
            'success' => false,
            'message' => ''
        ];
        $request->validated();
        $requestFields = $request->all();
        $parentGuid = $request['parent_guid'];
        if(!empty($parentGuid)) {
            $parent = Category::firstOrCreate(['guid' => $parentGuid]);
            $requestFields['parent_id'] = $parent ? $parent->id : null;
        } else {
            $requestFields['parent_id'] = null;
        }
        unset($requestFields['parent_guid']);
        $category = Category::firstOrCreate(['guid' => $request['guid']]);
        if(empty($category)) {
            $category = new Category();
        }
        $category->fill($requestFields);
        $category->is_active = isset($request['is_active']) ? $request['is_active'] : true;
        if($category->update()) {
            $responseData['success'] = true;
            $responseData['message'] = 'Saved';
        } else {
            \Log::alert('not saved: '.var_export($requestFields), 'exchange_category_update');
        }
        return response()->json($responseData);
    }
}
