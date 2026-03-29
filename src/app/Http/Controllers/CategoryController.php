<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /public function index()
    {
        $categories = Category::all();
        return view('category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:20']);
        Category::create($request->all());
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }
}
