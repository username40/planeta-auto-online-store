<?php

namespace App\Http\Controllers\Manage\Department;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DepartmentController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Department($attributes);
    }

    /**
     * @param Request $request
     * @param $type
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $itemsQuery = $this->gridQuery($request);
        return response()->json($itemsQuery->paginate(15));
    }
}
