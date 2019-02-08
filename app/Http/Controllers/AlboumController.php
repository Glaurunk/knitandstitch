<?php

namespace App\Http\Controllers;

use App\Alboum;
use Illuminate\Http\Request;

class AlboumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('alboums.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('alboums.create');
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
     * @param  \App\Alboum  $alboum
     * @return \Illuminate\Http\Response
     */
    public function show(Alboum $alboum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alboum  $alboum
     * @return \Illuminate\Http\Response
     */
    public function edit(Alboum $alboum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alboum  $alboum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alboum $alboum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alboum  $alboum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alboum $alboum)
    {
        //
    }
}
