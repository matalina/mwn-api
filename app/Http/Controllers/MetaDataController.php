<?php

namespace App\Http\Controllers;

use App\Notebook\MetaData;
use Illuminate\Http\Request;

class MetaDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
     * @param  \App\Notebook\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function show(MetaData $metaData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notebook\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaData $metaData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notebook\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaData $metaData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notebook\MetaData  $metaData
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetaData $metaData)
    {
        //
    }
}
