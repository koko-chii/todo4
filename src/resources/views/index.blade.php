@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@if (session('message'))
    <div class="todo__alert--success">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="todo__content">
    <div class="todo__inner">
        <h2 class="todo__form-ttl">新規作成</h2>
        <form class="create-form"  action="/todos" method="post">
            @csrf
            <div class="create-form__item">
                <input type="text" name="content" value="{{ old('content') }}" />
            </div>
            <div class="category__form__item">
                <select name="category_id" class="category__select">
                    <option value="" disabled selected>カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <div class="todo__search-form__inner">
        <h2 class="todo__search-form--ttl">Todo検索</h2>
        <form class="todo__search-form"  action="/todos/search" method="get">
            @csrf
            <div class="todo__search-form__item">
                <input type="text" name="content" value="{{ request('content') }}" />
            </div>
            <div class="category__search-form__item">
                <select name="category_id" class="category__select">
                    <option value="">カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
    </div>

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
                <th class="todo-table__header">カテゴリ</th>
        <th class="todo-table__header"></th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <form action="{{ route('todos.update') }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $todo->id }}">

                    <td class="todo-table__item">
                        <input type="text" name="content" value="{{ $todo->content }}" class="todo-table__item-input">
                    </td>
                    <td class="todo-table__item">
                        <div class="todo-table__buttons">
                            <button class="update-form__button-submit" type="submit">更新</button>
                </form>

                            <form action="{{ route('todos.destroy') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $todo->id }}">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </form>
                        </div>
                    </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection
