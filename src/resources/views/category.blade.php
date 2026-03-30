@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
@if (session('message'))
    <div class="category__alert--success">
        {{ session('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="category__alert--danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="category__content">
    <div class="category__inner">
        <form class="create-form" action="/categories" method="post">
            @csrf
            <div class="create-form__item">
                <input type="text" name="name" value="{{ old('name') }}" />
            </div>
            <div class="create-form__button">
                <button class="create-form__button-submit" type="submit">作成</button>
            </div>
        </form>
    </div>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__header">category</th>
            </tr>
            @foreach ($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action="{{ route('categories.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <input type="text" name="name" value="{{ $category->name }}" class="category-table__item-input">

                        <div class="category-table__buttons">
                            <button class="update-form__button-submit" type="submit">更新</button>
                    </form>

                    <form action="{{ route('categories.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $category->id }}">
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
