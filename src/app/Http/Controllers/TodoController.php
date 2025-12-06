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

  /**
 * Todo更新
 */
    public function update(TodoRequest $request)
{
    $todo = $request->only(['content']);
    Todo::find($request->id)->update($todo);

return redirect('/')->with('message', 'Todoを更新しました');
}
}
