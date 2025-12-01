<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Category;
use Illuminate\Http\Request;

class typeController extends Controller
{
    public function index()
    {
        $types = Type::with('category')->get();
        return view('Admin.type.index', compact('types'));
    }
    

    public function create()
    {
        $categories = Category::all();
        return view('Admin.type.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required',
            'edition'     => 'required'
        ]);

        Type::create($input);

        return redirect()->route('type.index')->with('success', 'Type added!'); 
    }

    public function show(Type $type)
    {
        return view('Admin.type.details', compact('type'));
    }

    public function edit(Type $type)
    {
        $categories = Category::all();
        return view('Admin.type.edit', compact('type', 'categories'));
    }

    public function update(Request $request, Type $type)
    {
        $input = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required',
            'edition'     => 'required'
        ]);

        $type->update($input);

        return redirect()->route('type.index')->with('success', 'Updated successfully!');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('type.index')->with('success', 'Deleted successfully!');
    }
}
