<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class bookController extends Controller
{
    public function index()
    {
        // eager load type -> category -> classification to avoid N+1 and null access
        $books = Book::with('type.category.classification')->get();

        return view('Admin.book.index', compact('books'));
    }

    public function create()
    {
        $types = Type::all();
        return view('Admin.book.create', compact('types')); //compact is used to pass data to the view
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'Picture'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author'      => 'required',
            'publisher'   => 'required',
            'description' => 'required',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'type_id'     => 'required|exists:types,id',
        ]);

        // start from validated data
        $input = $validated;

        if ($request->hasFile('Picture')) {
            $path = $request->file('Picture')->store('books', 'public'); //store image in storage/app/public/books
            // store public URL in DB field 'Picture'
            $input['Picture'] = Storage::url($path);
        } else {
            $input['Picture'] = $input['Picture'] ?? null; // ensure key exists
        }

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
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'Picture'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author'      => 'required',
            'publisher'   => 'required',
            'description' => 'required',
            'quantity'    => 'required|integer|min:0',
            'price'       => 'required|numeric|min:0',
            'type_id'     => 'required|exists:types,id',
        ]);

        $input = $validated;

        if ($request->hasFile('Picture')) {
            // delete old file if exists (derive relative path from stored URL in Picture)
            $oldUrl = $book->Picture;
            if ($oldUrl) {
                $oldPath = preg_replace('#^/storage/#', '', parse_url($oldUrl, PHP_URL_PATH) ?: $oldUrl);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('Picture')->store('books', 'public');
            $input['Picture'] = Storage::url($path);
        } else {
            // keep existing Picture if not uploading a new one
            $input['Picture'] = $input['Picture'] ?? $book->Picture;
        }

        $book->update($input);

        return redirect()->route('book.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        // delete stored image file if present (derive path from stored URL in Picture)
        $oldUrl = $book->Picture;
        if ($oldUrl) {
            $oldPath = preg_replace('#^/storage/#', '', parse_url($oldUrl, PHP_URL_PATH) ?: $oldUrl);
            Storage::disk('public')->delete($oldPath);
        }
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully!');
    }
}
