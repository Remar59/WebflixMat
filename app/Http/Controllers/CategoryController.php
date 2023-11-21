<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // return Category::all(); // SELECT * FROM categories

        return view('categories/index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories/create');
    }

    // Code qui se fait quand on envoie le formulaire
    public function store(Request $request)
    {
        // Validation du champ name. Si aucune erreur, on va dans le save
        // S'il y a une erreur, Laravel renvoie vers le form avec les
        // erreurs
        $request->validate([
            'name' => 'required|min:3|unique:categories|max:10|between:3,10',
        ]);

        // Insertion en base de données
        $category = new Category();
        // $request->name est le contenu du input name
        $category->name = $request->name; // $_POST['name']
        $category->save(); // INSERT INTO categories en Laravel

        return redirect('/categories');
    }
}
