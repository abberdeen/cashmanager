@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список счетов расходов') }}</div>

                    <div class="card-body">
                        <p><a href="{{ action('ExpenseAccountsController@create') }}" class="btn btn-primary">{{ __('Создать новый счет расходов') }}</a></p>
                        @if (count($accounts) == 0)
                            <p>Нет счетов, создайте новый счет</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="width">Название</th>
                                    <th>Заметки</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($accounts as $account)
                                    <tr>
                                        <td><a href="{{ action('ExpenseAccountsController@destroy', $account->id) }}">{{ $account->name }}</a></td>
                                        <td>{{ $account->notes }}</td>
                                        <td>
                                            <form method="POST" action="{{ action('ExpenseAccountsController@destroy', $account->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ action('ExpenseAccountsController@edit', $account->id) }}" class="btn btn-outline-secondary btn-sm">{{ __('Редактировать') }}</a>
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
