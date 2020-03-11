@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактировать счет') }}</div>

                    <div class="card-body">
                        <form  method="post" action="{{ action('ExpenseAccountsController@update', $expense->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="accountName">{{ __('Название') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{strlen(old('name'))>0 ? old('name') : $expense->name}}" id="accountName"  name="name" aria-describedby="nameHelp" required>
                                @if ($errors->has('name'))
                                    <small id="nameHelp" class="form-text text-danger">{{ __('Длина названия должна быть не менее 3 символов и не более 60 символов') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="accountNotes">{{ __('Заметки') }}</label>
                                <input type="text" class="form-control"  value="{{strlen(old('notes'))>0 ? old('notes') : $expense->notes}}" id="accountNotes"  name="notes" aria-describedby="nameHelp">
                            </div>
                            <button type="submit" class="btn btn-warning">{{ __('Сохранить изменения') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
