<?php

namespace App\Http\Controllers\Manage\Department;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Department;
use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SpecializationController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Specialization($attributes);
    }

    /**
     * @param \Illuminate\Support\Facades\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'type' => 'required|max:255',
        ]);
        $requestFields = $request->all();

        $model = new Specialization($requestFields);
        $model->type = Department::TYPE_SERVICE;
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
        $model = Specialization::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'type' => 'required|max:255',
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
        return response()->json('Specialization was destroyed', 200);
    }
}
