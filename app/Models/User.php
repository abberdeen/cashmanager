<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';


    /**
     *
     * @var string
     */
    const FIELD_EMAIL = "email";

    /**
     *
     * @var string
     */
    const FIELD_PASSWORD = "password";

    /**
     *
     * @var string
     */
    const FIELD_FIRST_NAME = "first_name";

    /**
     *
     * @var string
     */
    const FIELD_LAST_NAME = "last_name";

    /**
     * @return string
     */
    function getFullName() : string {
        return User::FIELD_FIRST_NAME . User::FIELD_LAST_NAME;
    }
}
