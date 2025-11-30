<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index()
    {
 
        $books = Book::with('type')->get();

        return view('Admin.book.index', compact('books'));
    }

    public function create()
    {
        $types = Type::all();
        return view('Admin.book.create', compact('types'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'titel'       => 'required|string|max:255',
            'Picture'     => 'nullable|string|max:255',  
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'description' => 'required|string',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'type_id'     => 'required|exists:types,id',
        ]);

        Book::create($input);

        return redirect()->route('book.index')->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        return view('Admin.book.details', compact('book'));
    }

    public function edit(Book $book)
    {
        $types = Type::all();
        return view('Admin.book.edit', compact('book', 'types'));
    }

    public function update(Request $request, Book $book)
    {
        $input = $request->validate([
            'titel'       => 'required|string|max:255',
            'Picture'     => 'nullable|string|max:255',
            'author'      => 'required|string|max:255',
            'publisher'   => 'required|string|max:255',
            'description' => 'required|string',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'type_id'     => 'required|exists:types,id',
        ]);

        $book->update($input);

        return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
    }
}
