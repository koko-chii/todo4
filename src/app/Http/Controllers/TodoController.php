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
        $todos = Todo::all();
        $categories = Category::all();
        return view('index', compact('todos', 'categories'));
    }

    public function store(TodoRequest $request)
    {
        $request->validate(['content' => 'required|max:20', ]);

            Todo::create(['content' => $request->content]);

            return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(Request $request)
    {
        $todo = Todo::find($request->id);
        $todo->content = $request->content;
        $todo->save();
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {
        $todo = Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

}