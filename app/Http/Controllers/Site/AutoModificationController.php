<?php

namespace App\Http\Controllers\Site;

use App\Models\AutoModel;
use App\Models\AutoModification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoModificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $modification_id
     * @return \Illuminate\Http\Response
     */
    public function attributes_by_modification($modification_id) {
        $modification = AutoModification::findOrFail($modification_id);

        return response()->json($modification->attributes);
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
     * @param  \App\Models\AutoModification  $autoModification
     * @return \Illuminate\Http\Response
     */
    public function show(AutoModification $autoModification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutoModification  $autoModification
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoModification $autoModification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutoModification  $autoModification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoModification $autoModification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutoModification  $autoModification
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoModification $autoModification)
    {
        //
    }

    public function filter(){
        $year = request('year');
        $auto_model_short_id = request('auto_model_short_id');
        $query = AutoModification::query();
        if($year){
            $query = $query
                ->whereYear('date_start', '<=', $year)
                ->where(function ($q) use ($year) {
                    $q->whereYear('date_end', '>=', $year)
                        ->orWhere('date_end', null);
                });
        }
        if($auto_model_short_id){
            $models_ids = AutoModel::where('auto_model_short_id', $auto_model_short_id)->pluck('id')->toArray();
            $query = $query->whereIn('auto_model_id', $models_ids);
        }
        $modifications = $query->with(['engines:name'])->get();
        return $modifications;
    }
}
