@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактировать запись дохода') }}</div>

                    <div class="card-body">
                        <form  method="post" action="{{ action('IncomesController@update', $income->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="incomeDesc">{{ __('Описание') }}</label>
                                <input type="text" class="form-control @error('desc') is-invalid @enderror"  value="{{ old('desc') ?? $income->desc }}" id="incomeDesc"  name="desc" aria-describedby="nameHelp" required>
                                @if ($errors->has('desc'))
                                    <small id="nameHelp" class="form-text text-danger">{{ __('Длина названия должна быть не менее 3 символов и не более 60 символов') }}</small>
                                @else
                                    <small id="nameHelp" class="form-text text-muted">{{ __('Введите название нового счета') }}</small>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="incomeAmount">{{ __('Сумма') }}</label>
                                        <input type="number" step="any" autocomplete="off" class="form-control @error('amount') is-invalid @enderror"  value="{{ old('amount') ?? $income->amount }}" id="incomeAmount"  name="amount" aria-describedby="nameHelp" required>
                                        @if ($errors->has('amount'))
                                            <small id="nameHelp" class="form-text text-danger">{{ __('') }}</small>
                                        @else
                                            <small id="nameHelp" class="form-text text-muted">{{ __('Введите сумму') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="currencySelect">{{ __('Валюта') }}</label>
                                        <select class="form-control  @error('currency') is-invalid @enderror" id="currencySelect" name="currency">
                                            @foreach($currencies as $currency)
                                                <option value="{{ $currency->id }}"  {{ $currency->id == (old('currency')  ?? $income->currency_id) ? 'selected' : '' }}>{{ $currency->code }} - {{ $currency->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="currencySelect">{{ __('Исходный счет') }}</label>
                                <select class="form-control @error('incomeAccount') is-invalid @enderror" id="incomeAccountSelect" name="incomeAccount" >
                                    <option value="" disabled selected>{{ __('Выберете счет') }}</option>
                                    @foreach($incomeAccounts as $incomeAccount)
                                        <option value="{{ $incomeAccount->id }}" {{ $incomeAccount->id == (old('incomeAccount') ?? $income->income_account_id) ? 'selected' : '' }}>{{ $incomeAccount->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="currencySelect">{{ __('Счет назначения') }}</label>
                                <select class="form-control @error('personalAccount') is-invalid @enderror" id="personalAccountSelect" name="personalAccount" >
                                    <option value="" disabled selected>{{ __('Выберете счет') }}</option>
                                    @foreach($personalAccounts as $personalAccount)
                                        <option value="{{ $personalAccount->id }}" {{ $personalAccount->id == (old('personalAccount') ?? $income->personal_account_id) ? 'selected' : '' }}>{{ $personalAccount->name }}</option>
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
