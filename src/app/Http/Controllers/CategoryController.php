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
        Category::create($request->all());
        return redirect('/categories')->with('message', 'カテゴリを作成しました');
    }

    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);

        if (!$category) {
        return back()->withErrors(['id' => '更新対象のカテゴリが見つかりませんでした (ID: ' . $request->id . ')']);
        }

        $category->update(['name' => $request->name]);

        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }
}

