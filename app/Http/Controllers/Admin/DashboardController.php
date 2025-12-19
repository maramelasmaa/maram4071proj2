<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Category;
use App\Models\Type;
use App\Models\Classification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic statistics
        $totalBooks = Books::count();
        $totalCategories = Category::count();
        $totalTypes = Type::count();
        $totalClassifications = Classification::count();

        // Most recent books
        $latestBooks = Books::latest()->take(5)->get();

        // Most popular books (assuming you have 'qtyInStock')
        $topBooks = Books::orderBy('qtyInStock', 'desc')->take(5)->get();

        return view('admin.dashboard.index', compact(
            'totalBooks',
            'totalCategories',
            'totalTypes',
            'totalClassifications',
            'latestBooks',
            'topBooks'
        ));
    }
}
