@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Редактировать категорию расходов') }}</div>

                    <div class="card-body">
                        <form  method="post" action="{{ action('CategoriesController@update', $category->id) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="accountName">{{ __('Название') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{strlen(old('name'))>0 ? old('name') : $category->name}}" id="accountName"  name="name" aria-describedby="nameHelp" required>
                                @if ($errors->has('name'))
                                    <small id="nameHelp" class="form-text text-danger">{{ __('Длина названия должна быть не менее 3 символов и не более 60 символов') }}</small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-warning">{{ __('Сохранить изменения') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
