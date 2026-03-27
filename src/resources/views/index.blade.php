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

<div class="todo__content">
    <div class="todo__inner">
        <form class="create-form"  action="/todos" method="post">
            @csrf
            <div class="create-form__item">
                <input type="text" name="content" value="{{ old('content') }}" />
            </div>

            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form action="{{ route('todos.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $todo->id }}">

                        <div class="todo-table__item input">
                            <input type="text" name="content" value="{{ $todo->content }}" class="todo-table__item-input">
                        </div>

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
