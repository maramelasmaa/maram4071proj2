<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Classification;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('Classcategory')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $classification = Classification::all();
        return view('admin.categories.create', compact('classification'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'class_id' => ['required', 'exists:classifications,id']
        ]);

        Category::create($input);
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        $classification = Classification::all();
        return view('admin.categories.edit', compact('category', 'classification'));
    }

    public function update(Request $request, Category $category)
    {
        $input = $request->validate([
            'name' => ['required'],
            'class_id' => ['required', 'exists:classifications,id']
        ]);
        $category->update($input);
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
                         ->with('success', 'Category deleted successfully');
    }
}