<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenses';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user record associated with the expense.
     */
    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    /**
     *
     * @var string
     */
    const FIELD_NAME = "name";

    /**
     *
     * @var float
     */
    const FIELD_AMOUNT = "amount";


    /**
     * Get the account record associated with the expense.
     */
    public function account()
    {
        return $this->hasOne('App\Models\Account');
    }

    /**
     * Get the expenseCategory record associated with the expense.
     */
    public function expenseCategory()
    {
        return $this->hasOne('App\Models\IncomeCategory');
    }

    /**
     *
     * @var
     */
    const FIELD_DATETIME = "datetime";
}
