<?php

namespace App\Http\Controllers\Manage\Directory;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Product($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request)
//            ->with(['properties'])
            ->paginate(15)
            ->appends($request->all());
        return response()->json($itemsQuery);
    }
}
