@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Счет '.$personal->name ) }}</div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <label for="accountName">{{ __('Название') }}</label>
                                <input   type="text"  value="{{ $personal->name }}" id="accountName">
                            </div>
                            <div class="form-group">
                                <label for="accountCurrency">{{ __('Валюта') }}</label>
                                <input   type="text"  value="{{ $personal->currency->code }} - {{ $personal->currency->name }}" id="accountCurrency">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
