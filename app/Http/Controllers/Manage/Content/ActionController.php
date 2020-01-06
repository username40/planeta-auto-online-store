<?php

namespace App\Http\Controllers\Manage\Content;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Action;
use App\Models\Department;
use Illuminate\Http\Request;

class ActionController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Action($attributes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
//        $itemsQuery->with('department_ids');
        return response()->json($itemsQuery->paginate(15));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:actions',
            'content' => 'required',
            'preview_img' => 'required',
            'publicated_at' => 'required',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);

        $action = new Action();
        $action->fill($request->all());
        $action->user_id = $request->user()->id;
        if($action->save()) {
            $action->departments()->sync($request->department_ids ?? []);
        }

        return response()->json('Saved');
    }

    /**
     * @param Request $request
     * @param Action $action
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Action $action)
    {
        $request->validate([
            'name' => 'max:255',
            'title' => "max:255|unique:actions,id,{$action->id}",
            'content' => 'min:6',
            'preview_img' => 'required',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);

        $action->fill($request->all());
        $action->save();
        $action->departments()->sync($request->department_ids ?? []);

        return response()->json('Saved');
    }

    /**
     * @param Action $action
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Action $action)
    {
        $action->delete();
        return response()->json('Action was destroyed', 200);
    }
}
