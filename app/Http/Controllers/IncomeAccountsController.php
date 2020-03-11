<?php

namespace App\Http\Controllers;

use App\Models\IncomeAccount;
use App\Models\Currency;
use Illuminate\Http\Request;

class IncomeAccountsController extends Controller
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
            'income_account.index',
            [
                'accounts' =>  IncomeAccount::where('user_id', auth()->id())->get()
            ]
        );
    }

    public function create()
    {
        return view('income_account.create');
    }

    /**
     * Store a new income_account.
     *
     * @return Response
     */
    public function store()
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        IncomeAccount::create([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'notes' => $request['notes']
        ]);
        return redirect(action('IncomeAccountsController@index'));
    }

    public function update(IncomeAccount $income)
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        $income->update([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'notes' => $request['notes']
        ]);
        return redirect(action('IncomeAccountsController@index'));
    }

    public function destroy(IncomeAccount $income)
    {
        $income->delete();
        return redirect(action('IncomeAccountsController@index'));
    }

    public function edit(IncomeAccount $income)
    {
        return view(
            'income_account.edit',
            [
                'income' => $income,
            ]
        );
    }

    public function show(IncomeAccount $income)
    {
        return view(
            'income_account.show',
            [
                'income' => $income
            ]
        );
    }

    private function validateRequest () {
        return request()->validate([
            'name' => ['required','min:3','max:60'],
            'notes' => []
        ]);
    }

}
