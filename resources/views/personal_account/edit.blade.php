@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактировать счет') }}</div>

                    <div class="card-body">
                        <form  method="post" action="{{ action('PersonalAccountsController@update', $personal->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="accountName">{{ __('Название') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') ?? $personal->name }}" id="accountName"  name="name" aria-describedby="nameHelp" required>
                                @if ($errors->has('name'))
                                    <small id="nameHelp" class="form-text text-danger">{{ __('Название должно быть не менее 3 символов и не более 60 символов') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="currencySelect">{{ __('Валюта') }}</label>
                                <select class="form-control" id="currencySelect" name="currency">
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}" @if ($currency->id == $personal->currency->id) selected @endif>{{ $currency->code }} - {{ $currency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">{{ __('Сохранить изменения') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
