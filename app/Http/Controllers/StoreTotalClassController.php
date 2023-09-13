<?php

namespace App\Http\Controllers;

use App\Models\StoreTotalClass;
use Illuminate\Http\Request;

class StoreTotalClassController extends Controller
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
        $request->validate([

            'class' => 'required|integer',
        ]);



        StoreTotalClass::create($request->all());



        return redirect()->route('control')

                        ->with('success','Product created successfully.');
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
    public function update(Request $request, StoreTotalClass $storeTotalClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StoreTotalClass $storeTotalClass)
    {
        //
    }
}
