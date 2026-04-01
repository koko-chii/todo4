<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('category', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);

        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    public function update(CategoryRequest $request)
    {
        $category = Category::findOrFail($request->id);
        $category->update(['name' => $request->name]);

        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();

        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}

