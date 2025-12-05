@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

{{-- アラート表示 --}}
@section('content')
<div class="todo__alert">
  <div class="todo__alert--success">
    Todoを作成しました
  </div>
</div>

{{-- Todo作成フォーム --}}
<div class="todo__content">
  <form class="create-form">
    <div class="create-form__item">
      <input class="create-form__item-input" type="text" name="content">
    </div>
    <div class="create-form__button">
      <button class="create-form__button-submit" type="submit">作成</button>
    </div>
  </form>

 {{-- Todoリスト --}}
  <div class="todo-list">
    <h2 class="todo-list__header">Todo</h2>

    <ul class="todo-list__items">
      @forelse($todos as $todo)
      <li class="todo-list__item">

{{-- 更新フォーム --}}
        <form class="update-form" action="/todos/update" method="POST">
          <div class="update-form__item">
            <input
              class="update-form__item-input"
              type="text"
              name="content"
              value="{{ $todo->content }}"
            >
            <input type="hidden" name="id" value="{{ $todo->id }}">
          </div>
          <div class="update-form__button">
            <button class="update-form__button-submit" type="submit">更新</button>
          </div>
        </form>

{{-- 削除フォーム --}}
        <form class="delete-form" action="/todos/delete" method="POST">
          <input type="hidden" name="id" value="{{ $todo->id }}">
          <button class="delete-form__button-submit" type="submit">削除</button>
        </form>
      </li>
      @empty
      <li class="todo-list__item--empty">Todoが登録されていません</li>
      @endforelse
    </ul>
  </div>
</div>
@endsection
