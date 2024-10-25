<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('app.categories.index', compact('categories'));
    }    
    
    public function show(Category $category)
    {
        // Récupère les contributions de la catégorie triées par nombre de "J'aime"
        $tracks = $category->tracks()->orderBy('likes_count', 'desc')->paginate(10);

        // Affiche la vue avec les données de la catégorie et des contributions
        return view('app.categories.show', compact('category', 'tracks'));
    }
}