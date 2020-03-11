<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'incomes';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user record associated with the income.
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
     * Get the personal_account record associated with the income.
     */
    public function account()
    {
        return $this->hasOne('App\Models\PersonalAccount');
    }

    /**
     * Get the incomeCategory record associated with the income.
     */
    public function incomeCategory()
    {
        return $this->hasOne('App\Models\IncomeAccount');
    }

    /**
     *
     * @var
     */
    const FIELD_DATETIME = "datetime";
}
