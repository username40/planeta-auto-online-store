<?php

namespace App\Http\Controllers\Site;

use App\Models\AutoMark;
use App\Models\AutoModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoModelController extends Controller
{

    public function all(){
        $models = AutoModel::get();
        return response()->json($models);
    }

    /**
     * Display a listing of the resource.
     *
     * @param $model_id
     * @return \Illuminate\Http\Response
     */
    public function modifications_by_model($model_id) {
        $model = AutoModel::findOrFail($model_id);

        return response()->json($model->modifications);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AutoModel  $autoModel
     * @return \Illuminate\Http\Response
     */
    public function show(AutoModel $autoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutoModel  $autoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoModel $autoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutoModel  $autoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoModel $autoModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutoModel  $autoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoModel $autoModel)
    {
        //
    }

    public function bigSearch(){
        $year = request('year');
        $auto_mark_id = request('auto_mark_id');
        $query = AutoModel::query();
        if($year){
            $query = $query
                ->whereYear('date_start', '<=', $year)
                ->where(function ($q) use ($year) {
                    $q->whereYear('date_end', '>=', $year)
                        ->orWhere('date_end', null);
                });
        }
        if($auto_mark_id){
            $query = $query->where('auto_mark_id', $auto_mark_id);
        }
        $models = $query->get();
        return $models;
    }

}
