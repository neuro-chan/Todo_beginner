@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

{{-- アラート表示エリア --}}
@section('content')

@if(session('message') || $errors->any())
<div class="todo__alert">
  {{-- 成功メッセージ --}}
  @if(session('message'))
  <div class="todo__alert--success">
    {{ session('message') }}
  </div>
  @endif

  {{-- エラーメッセージ --}}
  @if($errors->any())
  <div class="todo__alert--danger">
    @foreach($errors->all() as $error)
    <div class="error-item">{{ $error }}</div>
    @endforeach
  </div>
  @endif
</div>
@endif

{{-- Todo作成フォーム --}}
<div class="todo__content">
  <form class="create-form" action="/todos" method="post">
    @csrf
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
