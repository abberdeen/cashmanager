<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['user_id','desc','amount','currency_id','personal_account_id','income_account_id'];

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
        return $this->belongsTo('App\Models\User');
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
     * Get the currency record associated with the income.
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }

    /**
     * Get the personal_account record associated with the income.
     */
    public function personalAccount()
    {
        return $this->belongsTo('App\Models\PersonalAccount','personal_account_id');
    }

    /**
     * Get the incomeAccount record associated with the income.
     */
    public function incomeAccount()
    {
        return $this->belongsTo('App\Models\IncomeAccount','income_account_id');
    }

    /**
     *
     * @var
     */
    const FIELD_DATETIME = "datetime";
}
