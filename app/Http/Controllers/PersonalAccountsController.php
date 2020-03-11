<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccount;
use App\Models\Currency;
use Illuminate\Http\Request;

class PersonalAccountsController extends Controller
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
            'personal_account.index',
            [
                'accounts' =>  PersonalAccount::where('user_id', auth()->id())->get()
            ]
        );
    }

    public function create()
    {
        return view(
            'personal_account.create',
            [
                'currencies' =>  Currency::all()
            ]
        );
    }

    /**
     * Store a new personal_account.
     *
     * @return Response
     */
    public function store()
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        PersonalAccount::create([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'balance' => 0,
            'currency_id' => $request['currency']
        ]);
        return redirect(action('PersonalAccountsController@index'));
    }

    public function update(PersonalAccount $personal)
    {
        $request = $this->validateRequest();
        // The blog post is valid...
        $personal->update([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'currency_id' => $request['currency']
        ]);
        return redirect(action('PersonalAccountsController@index'));
    }

    public function destroy(PersonalAccount $personal)
    {
        $personal->delete();
        return redirect(action('PersonalAccountsController@index'));
    }

    public function edit(PersonalAccount $personal)
    {
        return view(
            'personal_account.edit',
            [
                'personal' => $personal,
                'currencies' =>  Currency::all()
            ]
        );
    }

    public function show(PersonalAccount $personal)
    {
        return view(
            'personal_account.show',
            [
                'personal' => $personal
            ]
        );
    }

    private function validateRequest () {
        return request()->validate([
            'name' => ['required','min:3','max:60'],
            'currency' => ['required']
        ]);
    }

}
