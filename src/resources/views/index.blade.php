@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">
    <p class="todo__alert--success">Todoを作成しました</p>
</div>

<div class="todo__content">
    <div class="todo__inner">
        <form class="create-form">
            <div class="create-form__item">
                <input type="text" name="name" value="{{ old('name') }}" />
            </div>

            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </form>
    </div>

    <div class="todo-table">
        <table class="todo-table__inner">
            <tr class="todo-table__row">
                <th class="todo-table__header">Todo</th>
            </tr>
            <tr class="todo-table__row">
                <td class="todo-table__item">
                    <form class="update-form">
                        <button class="update-form__button-submit" type="submit">更新</button>
                        <div class="form__error">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </form>
                    <form class="delete-form">
                        <button class="delete-form__button-submit" type="submit">削除</button>
                        <div class="form__error">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection
