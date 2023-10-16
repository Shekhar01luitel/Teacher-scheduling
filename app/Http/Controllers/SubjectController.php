<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresubjectRequest;
use App\Http\Requests\UpdatesubjectRequest;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;




class SubjectController extends Controller
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
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string'
        ]);

        subject::create($validator->validated());
        // dd($validator);
        return Redirect::route('subject');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresubjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $subject)
    {
        //
        $validate = Validator::make($request->all(), [
            'subject' => 'string',
        ]);
        // dd($_POST);

        $section = subject::find($subject);
        $section->update($validate->validated());
        return redirect()->back()->with('succcess', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject)
    {
        $subject->delete();
        return redirect()->back()->with('succcess', 'Form deleted successfully');
    }
}
