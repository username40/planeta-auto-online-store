<?php

namespace App\Http\Controllers\Manage\Directory;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Category($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request)
            ->paginate(15)
            ->appends($request->all());
        return response()->json($itemsQuery);
    }
}
