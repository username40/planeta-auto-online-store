<?php

namespace App\Http\Controllers\Manage\Content;

use App\Http\Controllers\Manage\CrudController;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends CrudController
{
    public static function getModel(array $attributes = [])
    {
        return new Page($attributes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|unique:pages',
            'content' => 'required',
            'publicated_at' => 'required',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);
        $user = $request->user();
        $requestFields = $request->all();

        if(!empty($user['id'])) {
            $requestFields['user_id'] = $user['id'];
            $page = new Page($requestFields);
            $page->save();
            return response()->json('Saved');
        }
    }

    /**
     * @param Request $request
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'max:255',
            'title' => "max:255|unique:pages,id,{$page->id}",
            'content' => 'min:6',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);
        $requestFields = $request->all();
        $page->update($requestFields);
        return response()->json('Saved');
    }

    /**
     * @param Page $page
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json('Page was destroyed', 200);
    }
}
