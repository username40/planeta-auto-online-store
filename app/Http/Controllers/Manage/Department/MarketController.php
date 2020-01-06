<?php

namespace App\Http\Controllers\Manage\Department;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MarketController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Department($attributes);
    }

    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @param $type
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
        $itemsQuery->where(['type' => Department::TYPE_MARKET]);
        $itemsQuery->with('city');
        return response()->json($itemsQuery->paginate(15));

    }

    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:255',
        ]);
        $requestFields = $request->all();

        $model = new Department($requestFields);
        $model->type = Department::TYPE_MARKET;
        $model->save();
        return response()->json('Saved');
    }

    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @param Integer $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = Department::findOrFail($id);
        $request->validate([
            'address' => 'required|max:255',
        ]);
        $requestFields = $request->all();
        $model->update($requestFields);
        return response()->json('Saved');
    }

    /**
     * @param Department $department
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json('Department was destroyed', 200);
    }
}
