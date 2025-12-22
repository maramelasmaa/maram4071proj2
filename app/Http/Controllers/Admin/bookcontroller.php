<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $term = trim((string) request()->input('q', request()->input('search', '')));

        $query = Books::query()
            ->with(['bookType.categoryType.Classcategory'])
            ->orderByDesc('created_at');

        if ($term !== '') {
            $query->where(function ($q) use ($term) {
                $q->where('title', 'LIKE', '%' . $term . '%')
                    ->orWhere('author', 'LIKE', '%' . $term . '%')
                    ->orWhere('publisher', 'LIKE', '%' . $term . '%');

                if (ctype_digit($term)) {
                    $q->orWhere('year', (int) $term);
                }
            })->orWhereHas('bookType', function ($q) use ($term) {
                $q->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('edition', 'LIKE', '%' . $term . '%')
                    ->orWhereHas('categoryType', function ($q) use ($term) {
                        $q->where('name', 'LIKE', '%' . $term . '%')
                            ->orWhereHas('Classcategory', function ($q) use ($term) {
                                $q->where('name', 'LIKE', '%' . $term . '%');
                            });
                    });
            });
        }

        $books = $query->get();
        return view('admin.books.index', compact('books', 'term'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.books.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required'],
            'author'      => ['required'],
            'description' => ['nullable'],
            'price'       => ['required', 'numeric'],
            'qtyInStock'  => ['required', 'integer'],
            'year'        => ['required', 'integer'],
            'publisher'   => ['required'],
            'picture'     => ['nullable', 'image', 'mimes:png,jpg'],
            'type_id'     => ['required', 'exists:types,id'],
        ]);

        $input = $request->except('picture');

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('books', 'public');
            $input['picture'] = $path;
        }

        Books::create($input);

        return redirect()->route('admin.books.index')
                         ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Books $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Books $book)
    {
        $types = Type::all();
        return view('admin.books.edit', compact('book', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Books $book)
    {
        $request->validate([
            'title'       => ['required'],
            'author'      => ['required'],
            'description' => ['nullable'],
            'price'       => ['required', 'numeric'],
            'qtyInStock'  => ['required', 'integer'],
            'year'        => ['required', 'integer'],
            'publisher'   => ['required'],
            'picture'     => ['nullable', 'image', 'mimes:png,jpg'],
            'type_id'     => ['required', 'exists:types,id'],
        ]);

        $input = $request->except('picture');

        if ($request->hasFile('picture')) {

            // delete old file if exists
            if ($book->picture) {
                Storage::disk('public')->delete($book->picture);
            }

            $path = $request->file('picture')->store('books', 'public');
            $input['picture'] = $path;
        }

        $book->update($input);

        return redirect()->route('admin.books.index')
                         ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Books $book)
    {
        if ($book->picture) {
            Storage::disk('public')->delete($book->picture);
        }

        $book->delete();

        return redirect()->route('admin.books.index')
                         ->with('success', 'Book deleted successfully.');
    }
}
