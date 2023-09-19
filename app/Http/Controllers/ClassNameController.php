<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreClassNameRequest;
use App\Http\Requests\UpdateClassNameRequest;
use App\Models\ClassName;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClassNameController extends Controller
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
        // dd($_POST);
        // $request->validate([
        //     'class' => 'required|string',
        // ]);

        // // Create a new school record in the database
        // $className = new ClassName();
        // $className->class = $request->input('class');
        // $className->save();


        $validator = Validator::make($request->all(), [
            'class' => 'required|string'
        ]);

        ClassName::create($validator->validated());

        return Redirect::route('class');
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
    public function show(ClassName $className)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassName $className)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassNameRequest $request, ClassName $class)
    {
        // dd($class);
        $class->class = $request->input('name');
        $class->save();

        return redirect()->back()->with('success', 'School name updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassName $form)
    {
        // dd($form);
        $form->delete();
        return redirect()->back()->with('succcess', 'Form deleted successfully');
    }
}
