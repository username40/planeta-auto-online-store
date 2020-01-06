<?php

namespace App\Http\Controllers\Manage\Directory;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Brand($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
        return response()->json($itemsQuery->paginate(15));
    }
}
