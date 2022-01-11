<?php

namespace App\Repositories\Database\User;

use App\Repositories\Database\Models\User;

class UserMysql
{
    /**
     * @return string
     */
    public function getData()
    {
        return User::class;
    }
}
