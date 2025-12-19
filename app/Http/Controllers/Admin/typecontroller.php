<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::with('categoryType')->get();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.types.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'edition'     => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Type::create([
            'name'        => $request->name,
            'edition'     => $request->edition,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.types.index')->with('success', 'Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $categories = Category::all();
        return view('admin.types.edit', compact('type', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'edition'     => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $type->update([
            'name'        => $request->name,
            'edition'     => $request->edition,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.types.index')->with('success', 'Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index') ->with('success', 'Type deleted successfully.');
    }
}
