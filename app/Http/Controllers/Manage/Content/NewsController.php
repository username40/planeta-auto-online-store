<?php

namespace App\Http\Controllers\Manage\Content;

use App\Http\Controllers\Manage\CrudController;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends CrudController
{

    public static function getModel(array $attributes = [])
    {
        return new News($attributes);
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
            'title' => 'required|max:255|unique:news',
            'content' => 'required',
            'preview_img' => 'required',
            'publicated_at' => 'required',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);
        $user = $request->user();
        $requestFields = $request->all();

        if(!empty($user['id'])) {
            $requestFields['user_id'] = $user['id'];
            $model = self::getModel($requestFields);
            $model->save();
            return response()->json('Saved');
        }
    }

    /**
     * @param Request $request
     * @param News $news
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'name' => 'max:255',
            'title' => "max:255|unique:news,id,{$news->id}",
            'content' => 'min:6',
            'preview_img' => 'required',
            'show' => 'boolean',
            'archive' => 'boolean',
        ]);
        $requestFields = $request->all();
        $news->update($requestFields);
        return response()->json('Saved');
    }

    /**
     * @param News $model
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json('News was destroyed', 200);
    }
}
