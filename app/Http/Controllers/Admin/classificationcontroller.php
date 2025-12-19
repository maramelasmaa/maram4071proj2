<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        return view('admin.classifications.index', compact('classifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classifications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Classification::create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.classifications.index')->with('success', 'Classification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classification $classification)
    {
        return view('admin.classifications.show', compact('classification'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classification $classification)
    {
        return view('admin.classifications.edit', compact('classification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classification $classification)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $classification->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.classifications.index') ->with('success', 'Classification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();

        return redirect()->route('admin.classifications.index')->with('success', 'Classification deleted successfully.');
    }
}
