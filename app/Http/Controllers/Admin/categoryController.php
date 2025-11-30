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
    $categories = Category::with('classification')->get(); //collection of object 
    return view('Admin.category.index', compact('categories'));
}


    public function create()
    {
        $classes = Classification::all();
        return view('Admin.category.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'class_id' => 'required|exists:classifications,id',
            'name'     => 'required'
        ]);

        Category::create($input);

        return redirect()->route('category.index')->with('success', 'Category added!');//action
    }

    public function show(Category $category)
    {
        return view('Admin.category.details', compact('category'));
    }

    public function edit(Category $category)
    {
        $classes = Classification::all();
        return view('Admin.category.edit', compact(['category', 'classes']));
    }

    public function update(Request $request, Category $category)
    {
        $input = $request->validate([
            'class_id' => 'required|exists:classifications,id',
            'name'     => 'required'
        ]);

        $category->update($input);

        return redirect()->route('category.index')->with('success', 'Updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Deleted successfully!');
    }
}
