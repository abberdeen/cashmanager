@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список категорий расходов') }}</div>

                    <div class="card-body">
                        <p><a href="{{ action('CategoriesController@create') }}" class="btn btn-primary">{{ __('Создать новую категорию') }}</a></p>
                        @if (count($categories) == 0)
                            <p>Нет категорий, создайте новую категорию</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="width">Название</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><a href="{{ action('CategoriesController@destroy', $category->id) }}">{{ $category->name }}</a></td>
                                        <td>
                                            <form method="POST" action="{{ action('CategoriesController@destroy', $category->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ action('CategoriesController@edit', $category->id) }}" class="btn btn-outline-secondary btn-sm">{{ __('Редактировать') }}</a>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">{{ __('Удалить') }}</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
