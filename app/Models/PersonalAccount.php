<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAccount extends Model
{

    protected $fillable = ['name', 'balance', 'currency_id', 'user_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_accounts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *
     * @var integer
     */
    const FIELD_USER_ID = "user_id";

    /**
     * Get the user record associated with the personal_account.
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
    const FIELD_BALANCE = "balance";

    /**
     *
     * @var integer
     */
    const FIELD_CURRENCY_ID = "currency_id";

    /**
     * Get the currency record associated with the personal_account.
     */
    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }
}
