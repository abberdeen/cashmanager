@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Список доходов') }}</div>

                    <div class="card-body">
                        <p><a href="{{ action('IncomesController@create') }}" class="btn btn-primary">{{ __('Создать новую запись дохода') }}</a></p>
                        @if (count($incomes) == 0)
                            <p>Нет записей, создайте новую запись</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="width">{{ __('Название') }}</th>
                                    <th class="width">{{ __('Сумма') }}</th>
                                    <th class="width">{{ __('Дата') }}</th>
                                    <th class="width">{{ __('Исходный счет') }}</th>
                                    <th class="width">{{ __('Счет назначения') }}</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($incomes as $income)
                                    <tr>
                                        <td><a href="{{ action('IncomesController@show', $income->id) }}">{{ $income->desc }}</a></td>
                                        <td>{{ $income->amount .' '. $income->currency->code }}</td>
                                        <td>{{ date('d.m.Y', strtotime($income->created_at)) }}</td>
                                        <td><a href="{{ action('IncomeAccountsController@show', $income->incomeAccount->id) }}">{{ $income->incomeAccount->name }}</a></td>
                                        <td><a href="{{ action('PersonalAccountsController@show', $income->personalAccount->id) }}">{{ $income->personalAccount->name }}</a></td>
                                        <td>
                                            <form method="POST" action="{{ action('IncomesController@destroy', $income->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ action('IncomesController@edit', $income->id) }}" class="btn btn-outline-secondary btn-sm">{{ __('Редактировать') }}</a>
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
