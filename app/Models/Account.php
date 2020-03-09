<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user record associated with the account.
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
     * @var string
     */
    const FIELD_CURRENCY = "currency";
}
