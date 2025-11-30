<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index()
    {
        $classification = Classification::count();
        $category = Category::count();
        $type = Type::count();
        $book = Book::count();

       
        $chartlabel = Classification::pluck("name");
        $chartvalues = Classification::withCount("categories")->pluck("categories_count");

        return view('Admin.dashboard.index', compact(['classification',
            'category',
            'type',
            'book',
            'chartlabel',
            'chartvalues']
            
        ));
    }
}
