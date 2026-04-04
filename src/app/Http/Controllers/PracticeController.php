<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index($menu)
    {
        return view('practice', ['menu' => $menu]);
    }
}
