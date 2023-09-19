<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomPeriodRequest;
use App\Http\Requests\UpdateCustomPeriodRequest;
use App\Models\CustomPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CustomPeriodController extends Controller
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
            'periods' => 'required|string'
        ]);

        CustomPeriod::create($validator->validated());
        // dd($validator);
        return Redirect::route('periods');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomPeriodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomPeriod $customPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomPeriod $customPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $period)
    {
        $validator = Validator::make($request->all(), [
            'periods' => 'required|string'
        ]);

        $customPeriod = CustomPeriod::find($period);

        $customPeriod->update($validator->validated());

        return redirect()->route('periods')->with('succcess', 'Record updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomPeriod $period)
    {
        $period->delete();
        return redirect()->back()->with('succcess', 'Form deleted successfully');
    }
}
