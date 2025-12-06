<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
/**
 * Todo一覧表示
 */
    public function index()
  {
      $todos = Todo::all();
      return view('index', compact('todos'));
  }
/**
 * Todo追加
 */
    public function store(TodoRequest $request)
  {
     $todo = $request->only(['content']);
  Todo::create($todo);

  return redirect('/');
  }
}
