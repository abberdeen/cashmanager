<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('accounts/personal', 'PersonalAccountsController')->middleware('auth');
Route::post('/accounts/personal/save', 'PersonalAccountsController@store');

Route::resource('accounts/expense', 'ExpenseAccountsController')->middleware('auth');
Route::post('/accounts/expense/save', 'ExpenseAccountsController@store');

Route::resource('accounts/income', 'IncomeAccountsController')->middleware('auth');
Route::post('/accounts/income/save', 'IncomeAccountsController@store');

Route::resource('categories', 'CategoriesController')->middleware('auth');
Route::post('/categories/save', 'CategoriesController@store');

Route::resource('incomes', 'IncomesController')->middleware('auth');
Route::post('/incomes/save', 'IncomesController@store');

Route::resource('expenses', 'ExpensesController')->middleware('auth');
Route::post('/expenses/save', 'ExpensesController@store');

function outRoutes(){
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $value) {
        echo($value->uri)."<br>";
    }
}
