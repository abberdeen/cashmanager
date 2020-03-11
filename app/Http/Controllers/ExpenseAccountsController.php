<?php

namespace App\Http\Controllers;

use App\Models\ExpenseAccount;
use App\Models\Currency;
use Illuminate\Http\Request;

class ExpenseAccountsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view(
            'expense_account.index',
            [
                'accounts' =>  ExpenseAccount::where('user_id', auth()->id())->get()
            ]
        );
    }

    public function create()
    {
        return view('expense_account.create');
    }

    /**
     * Store a new expense_account.
     *
     * @return Response
     */
    public function store()
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        ExpenseAccount::create([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'notes' => $request['notes']
        ]);
        return redirect(action('ExpenseAccountsController@index'));
    }

    public function update(ExpenseAccount $expense)
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        $expense->update([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'notes' => $request['notes']
        ]);
        return redirect(action('ExpenseAccountsController@index'));
    }

    public function destroy(ExpenseAccount $expense)
    {
        $expense->delete();
        return redirect(action('ExpenseAccountsController@index'));
    }

    public function edit(ExpenseAccount $expense)
    {
        return view(
            'expense_account.edit',
            [
                'expense' => $expense,
            ]
        );
    }

    public function show(ExpenseAccount $expense)
    {
        return view(
            'expense_account.show',
            [
                'expense' => $expense
            ]
        );
    }

    private function validateRequest () {
        return request()->validate([
            'name' => ['required','min:3','max:32'],
            'notes' => []
        ]);
    }

}
