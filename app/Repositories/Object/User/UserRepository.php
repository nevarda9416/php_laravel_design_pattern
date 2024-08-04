<?php

namespace App\Repositories\Object\User;

use App\Repositories\Cache\User\UserRedis;
use App\Repositories\Database\User\UserMysql;
use App\Repositories\Repository;

class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @return mixed|string|null
     */
    public function setModel()
    {
        $redis = new UserRedis;
        if ($redis->getData() == null) {
            $mysql = new UserMysql;

            return $mysql->getData();
        } else {
            return $redis->getData();
        }
    }

    /**
     * @return mixed
     */
    public function getTopUsers($limit)
    {
        return $this->model->select('name')->take($limit)->orderBy('id', 'DESC')->get();
    }

    /**
     * @return |null
     */
    public function getName($name)
    {
        $mysql = new UserMysql($name);

        return $mysql->getName();
    }

    /**
     * @return |null
     */
    public function getOtherName()
    {
        $mysql = new UserMysql;
        $mysql->setName('David Copperfield');

        return $mysql->getName();
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->model->count();
    }
}
