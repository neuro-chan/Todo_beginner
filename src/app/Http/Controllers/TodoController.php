<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{
/**
 * Todo一覧表示
 */
    public function index()
  {
      $todos = Todo::with('category')->get();
      $categories = Category::all();
      return view('index', compact('todos', 'categories'));
  }
/**
 * Todo追加
 */
    public function store(TodoRequest $request)
  {
     $todo = $request->only(['category_id', 'content']);
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

  /**
 * Todo削除
 */
    public function destroy(Request $request)
{
    Todo::find($request->id)->delete();
    return redirect('/')->with('message', 'Todoを削除しました');
}

  /**
 * Todo検索
 */
    public function search(Request $request)
{
  $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
  $categories = Category::all();

  return view('index', compact('todos', 'categories'));
}
}
