<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storecustom_sectionRequest;
// use App\Http\Requests\Updatecustom_sectionRequest;
use App\Models\CustomSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomSectionController extends Controller
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
    // public function create()
    // {
    //     //
    // }

    public function create(Request $request)
    {
        // dd($_POST);

        $request->validate([
            'section' => 'required|string',
            'class_id' => 'required|integer'
        ]);
        // dd($_POST);

        // Create a new school record in the database
        $sectionname = new CustomSection();
        $sectionname->section_name = $request->input('section');
        $sectionname->class_id = $request->input('class_id');
        $sectionname->save();
        return Redirect::route('class.section');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storecustom_sectionRequest $request)
    {

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomSection $CustomSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomSection $CustomSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CustomSection $form)
    {
        // dd($request->all());
        $form->delete();
        return redirect()->back()->with('succcess', 'Form deleted successfully');
    }
}
