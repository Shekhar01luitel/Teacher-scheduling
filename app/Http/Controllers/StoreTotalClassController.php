<?php

// All School Name
namespace App\Http\Controllers;

use App\Models\StoreTotalClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StoreTotalClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd($schoolList);
        // return view('admin.body.content.control', compact('schoolList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'school' => 'required|string',
        ]);

        // Create a new school record in the database
        $storeTotalClass = new StoreTotalClass();
        $storeTotalClass->school = $request->input('school');
        $storeTotalClass->save();

        // Retrieve the list of schools from the database
        // $schoolList = StoreTotalClass::all(); // Replace 'StoreTotalClass' with the actual model name

        // Redirect to the 'index' method of the StoreTotalClassController
        // return redirect()->route('control');

        return Redirect::route('control');


        // return redirect()->route('control',compact('schoolList'))
        //     ->with('success', 'School created successfully.');
        // dd($storeTotalClass->school);
        // return redirect()->route('control', compact('storeTotalClass'))
        //     ->with('success', 'Product created successfully.');
        // return view('');
        // return view('admin.body.content.test_control');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StoreTotalClass $storeTotalClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StoreTotalClass $storeTotalClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StoreTotalClass $form)
    {
        $request->validate([
            'name' => 'required|string',
        ]);
        // dd($request->input('name'));
        // Update the name of the school
        $form->school = $request->input('name');
        $form->save();

        return redirect()->back()->with('success', 'School name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(StoreTotalClass $form)
    {
        $form->delete();
        return redirect()->back()->with('succcess', 'Form deleted successfully');
    }
}
