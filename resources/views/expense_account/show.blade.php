@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Счет '.$expense->name ) }}</div>

                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <h2>{{ $expense->name }}</h2>
                                <p>{{ $expense->notes }}</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
