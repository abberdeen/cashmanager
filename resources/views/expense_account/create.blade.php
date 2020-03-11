@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Создать счет расходов') }}</div>

                    <div class="card-body">
                        <form  method="post" action="{{ action('ExpenseAccountsController@store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="accountName">{{ __('Название') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{old('name')}}" id="accountName"  name="name" aria-describedby="nameHelp" required>
                                @if ($errors->has('name'))
                                    <small id="nameHelp" class="form-text text-danger">{{ __('Длина названия должна быть не менее 3 символов и не более 60 символов') }}</small>
                                @else
                                    <small id="nameHelp" class="form-text text-muted">{{ __('Введите название нового счета') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="accountNotes">{{ __('Заметки') }}</label>
                                <input type="text" class="form-control"  value="{{old('notes')}}" id="accountNotes"  name="notes" aria-describedby="nameHelp">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Создать новый счет') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
