<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Action;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ActionController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Action($attributes);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function index(Request $request)
    {
        $itemsQuery = $this->gridQuery($request);
        $itemsQuery
            ->where('show', 1)
            ->where('expiration_at', '>', (new \DateTime())->format('Y-m-d'));
        $itemsQuery->with('departments');
        return response()->json($itemsQuery->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Action $action
     * @return \Illuminate\Http\Response
     */
    public function show(Action $action)
    {
        $action->setVisible([
            'id',
            'title',
            'slug',
            'content',
            'archive',
            'show',
            'publicated_at',
            'expiration_at',
            'preview_img',
            'departments',
            'preview_img_url'
        ]);
        $action->load('departments');
        return response()->json($action);
    }
}
