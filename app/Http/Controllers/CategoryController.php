<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('app.categories.index', compact('categories'));
    }    
    
    public function show(Category $category): View
    {
        $tracks = $category->tracks()
            ->withCount('likes')
            ->orderBy('likes_count', 'desc') 
            ->paginate(10);

        return view('app.categories.show', compact('category', 'tracks'));
    }
}