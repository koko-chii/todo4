<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('category')->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        $todoData = $request->only(['category_id', 'content']);
        Todo::create($todoData);

        return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(Request $request)
    {
        Todo::where('id', $request->id)->update($request->only(['content']));

        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id)->delete();

        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')
        ->CategorySearch($request->category_id)
        ->KeywordSearch($request->content)
        ->get();

        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }

}