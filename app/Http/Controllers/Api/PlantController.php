<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plantation;
use App\Http\Resources\Plantation as PlantationResource;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        return Plantation::paginate(4);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Plantation::create($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Plantation $Plantation
     * @return \Illuminate\Http\Response
     */
    public function show(Plantation $plantation)
    {
        return new PlantationResource($plantation);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plantation $Plantation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plantation $plantation)
    {
        $plantation->update($request->all());
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plantation $Plantation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plantation $plantation)
    {
        $plantation->delete();
    }
}
