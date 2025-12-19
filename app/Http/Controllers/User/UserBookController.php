<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class UserBookController extends Controller
{
    public function index()
    {
        $books=Books::orderByDesc('created_at')->get();
        return view('user.Home.index',compact('books'));
    }

    public function search(Request $request)
    {
        $term = trim((string) $request->input('q', $request->input('title', '')));

        $query = Books::query()->orderByDesc('created_at');

        if ($term !== '') {
            $query->where(function ($q) use ($term) {
                $q->where('title', 'LIKE', '%' . $term . '%')
                    ->orWhere('author', 'LIKE', '%' . $term . '%')
                    ->orWhere('publisher', 'LIKE', '%' . $term . '%');

                if (ctype_digit($term)) {
                    $q->orWhere('year', (int) $term);
                }
            });
        }

        $books = $query->get();
        return view('user.Home.index', compact('books'));
    }
}
