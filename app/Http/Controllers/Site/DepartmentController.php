<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Department;
use Illuminate\Http\Request;

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
        $departments = Department::with('images', 'actions')
            ->get();

        return response()->json($departments);
    }

    public function show(Department $department) {
        $department
            ->load(['images:id,model_id,model_type,path', 'actions']);

        return response()->json($department);
    }
}
