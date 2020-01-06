<?php

namespace App\Http\Controllers;

use App\Models\AutoMark;
use Illuminate\Http\Request;

class AutoMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param $mark_id
     * @return \Illuminate\Http\Response
     */
    public function models_by_mark($mark_id) {
        $mark = AutoMark::findOrFail($mark_id);

        return response()->json($mark->models);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $marks = AutoMark::all();
        return response()->json($marks);
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
     * @param  \App\Models\AutoMark  $autoMark
     * @return \Illuminate\Http\Response
     */
    public function show(AutoMark $autoMark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AutoMark  $autoMark
     * @return \Illuminate\Http\Response
     */
    public function edit(AutoMark $autoMark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AutoMark  $autoMark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutoMark $autoMark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AutoMark  $autoMark
     * @return \Illuminate\Http\Response
     */
    public function destroy(AutoMark $autoMark)
    {
        //
    }
}
