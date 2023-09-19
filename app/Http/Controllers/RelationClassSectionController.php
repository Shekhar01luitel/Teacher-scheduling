<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRelationClassSectionRequest;
use App\Http\Requests\UpdateRelationClassSectionRequest;
use App\Models\RelationClassSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RelationClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|integer',
            'section_id' => 'required|integer'
        ]);


        RelationClassSection::create($validator->validated());
        // dd($validator);
        return Redirect::route('relationclasssection');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRelationClassSectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RelationClassSection $relationClassSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RelationClassSection $relationClassSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRelationClassSectionRequest $request, RelationClassSection $relationClassSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RelationClassSection $relationClassSection)
    {
        //
    }
}
