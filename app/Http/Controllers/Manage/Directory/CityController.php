<?php

namespace App\Http\Controllers\Manage\Directory;

use App\Http\Controllers\Manage\CrudController;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new City($attributes);
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
