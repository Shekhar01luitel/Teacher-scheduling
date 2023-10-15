<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRelationClassSectionRequest;
use App\Http\Requests\UpdateRelationClassSectionRequest;
use App\Models\RelationClassSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    // public function create(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'class_id' => 'required|integer',
    //         'section_id' => 'required|integer'
    //     ]);


    //     RelationClassSection::create($validator->validated());
    //     // dd($validator);
    //     return Redirect::route('relationclasssection');
    // }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required|integer',
            'section_id' => [
                'required',
                'integer',
                Rule::unique('relation_class_sections')->where(function ($query) use ($request) {
                    return $query->where('class_id', $request->class_id)
                        ->where('section_id', $request->section_id);
                }),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('relationclasssection')
                ->with('error', 'Data already exist');
        }

        RelationClassSection::create($validator->validated());

        return redirect()->route('relationclasssection')->with('success', 'Data created successfully');
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

    public function destroy(Request $request)
    {
        // dd($request)->toArray();
        // Retrieve class_id and section_id from the request
        $class_id = $request->input('classId');
        $section_id = $request->input('sectionId');

        // Find the record in the RelationClassSection model
        $relation = RelationClassSection::where('class_id', $class_id)
            ->where('section_id', $section_id)
            ->first();

        // Check if the record exists
        if ($relation) {
            $relation->delete();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Form deleted successfully');
        } else {
            // Handle the case where the record does not exist
            return redirect()->back()->with('error', 'Form not found or already deleted');
        }
    }
}
