<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Todo表示
Route::get('/', [TodoController::class, 'index']);

// Todo作成
Route::post('/todos', [TodoController::class, 'store']);

// Todo更新
Route::patch('/todos/update', [TodoController::class, 'update']);

// Todo削除
Route::delete('/todos/delete', [TodoController::class, 'destroy']);

// カテゴリ表示
Route::get('/categories', [CategoryController::class, 'index']);

// カテゴリ追加
Route::post('/categories', [CategoryController::class, 'store']);

// カテゴリ更新
Route::patch('/categories/update', [CategoryController::class, 'update']);

// カテゴリ削除
Route::delete('/categories/delete', [CategoryController::class, 'destroy']);
// Todo検索
Route::get('/todos/search', [TodoController::class, 'search']);
