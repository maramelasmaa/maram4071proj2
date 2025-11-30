<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class classificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications =Classification::all();
        return view('Admin.classification.index',compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.classification.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input=$request->validate([
            "name"=>["required"]
        ]);
        Classification::create($input);
        return redirect()->route('classification.index')->with('success','added successffully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classification $classification)
    {
         return view('Admin.classification.details',compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classification $classification)
    {
        return view('Admin.classification.edit',compact("classification"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Classification $classification)
    {
        $input=$request->validate([
            "name"=>["required"]
        ]);
        $classification->update($input);
        return redirect()->route('classification.index')->with('success','updated successffully');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();
        return redirect()->route('classification.index')->with('success','deleted successffully');
    }
}
