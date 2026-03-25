<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        $request->validate(['content' => 'required|max:20', ]);

            Todo::create(['content' => $request->content]);

            return redirect('/')->with('message', 'Todoを作成しました');
    }

}