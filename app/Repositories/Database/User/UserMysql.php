<?php

namespace App\Repositories\Database\User;

use App\Repositories\Database\Models\User;

class UserMysql
{
    /**
     * @var $name
     */
    public $name;

    /**
     * UserMysql constructor.
     * @param $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return User::class;
    }
}
