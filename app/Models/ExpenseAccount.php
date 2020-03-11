<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseAccount extends Model
{
    protected $fillable = ['name', 'notes' , 'user_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expense_accounts';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user record associated with the expense category.
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


}
