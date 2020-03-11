<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Income;
use App\Models\IncomeAccount;
use App\Models\PersonalAccount;
use Illuminate\Http\Request;

class IncomesController extends Controller
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
            'income.index',
            [
                'incomes' =>  Income::where('user_id', auth()->id())->get()
            ]
        );
    }

    public function create()
    {
        return view('income.create',
            [
                'currencies' =>  Currency::all(),
                'personalAccounts' =>  PersonalAccount::where('user_id', auth()->id())->get(),
                'incomeAccounts' =>  IncomeAccount::where('user_id', auth()->id())->get(),
            ]);
    }

    /**
     * Store a new income.
     *
     * @return Response
     */
    public function store()
    {
        Income::create($this->getRequestData());
        return redirect(action('IncomesController@index'));
    }

    public function update(Income $income)
    {
        $income->update($this->getRequestData());
        return redirect(action('IncomesController@index'));
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect(action('IncomesController@index'));
    }

    public function edit(Income $income)
    {
        return view(
            'income.edit',
            [
                'income' => $income,
                'currencies' =>  Currency::all(),
                'personalAccounts' =>  PersonalAccount::where('user_id', auth()->id())->get(),
                'incomeAccounts' =>  IncomeAccount::where('user_id', auth()->id())->get(),
            ]
        );
    }

    public function show(Income $income)
    {
        return view(
            'income.show',
            [
                'income' => $income,
                'currencies' =>  Currency::all(),
                'personalAccounts' =>  PersonalAccount::where('user_id', auth()->id())->get(),
                'incomeAccounts' =>  IncomeAccount::where('user_id', auth()->id())->get(),
            ]
        );
    }

    private function getRequestData() {
        $request = $this->validateRequest();
        // The blog post is valid...
        return [
            'user_id' => auth()->id(),
            'desc' => $request['desc'],
            'amount' => $request['amount'],
            'currency_id' => $request['currency'],
            'income_account_id' => $request['incomeAccount'],
            'personal_account_id' => $request['personalAccount']
        ];
    }

    private function validateRequest () {
        return request()->validate([
            'desc' => ['required','min:3','max:32'],
            'amount' => ['required'],
            'currency' => ['required'],
            'incomeAccount' => ['required'],
            'personalAccount' => ['required'],
        ]);
    }

}
