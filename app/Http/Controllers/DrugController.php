<?php

namespace App\Http\Controllers;

use App\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drug = Drug::latest()->paginate(20);
        return response(json(compact('drugs')),200);
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
        Drug::create($request->all());
        return response('New drug created successfully',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function show(Drug $drug)
    {
        //
        return response(compact('drug'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function edit(Drug $drug)
    {
        //
        return response(compact('drug'),200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Drug $drug)
    {
        //
        Drug::update($request->all(),$drug);
        return response('drug\'s data updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drug  $drug
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drug $drug)
    {
        //
        Drug::destroy($drug);
        return response('Drug deleted successfully',200);
    }
}
