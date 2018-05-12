<?php

namespace App\Http\Controllers;

use App\DrugCategory;
use Illuminate\Http\Request;

class DrugCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $drugcategories = DrugCategory::latest()->paginate(20);
        return response(compact('drugcategories'),200);
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
        DrugCategory::create($request->all());
        return response('New Category created successfully',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drugcategory = DrugCategory::find($id)->first();
        return response(compact('drugcategory'),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DrugCategory $drugCategory)
    {
        //
        return response(compact('DrugCategory'), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrugCategory $drugCategory)
    {
        //
        DrugCategory::update($request->all(),$drugCategory);
        return response('category\'s data updated successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrugCategory  $drugCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrugCategory $drugCategory)
    {
        //
        DrugCategory::destroy($drugCategory);
        return response('DrugCategory deleted successfully',200);
    }
}
