<?php

namespace App\Repositories\Object\User;

use App\Repositories\Database\User\UserMysql;
use App\Repositories\Cache\User\UserRedis;
use App\Repositories\Repository;

class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @return mixed|string|null
     */
    public function setModel()
    {
        $redis = new UserRedis();
        if ($redis->getData() == null) {
            $mysql = new UserMysql();
            return $mysql->getData();
        } else {
            return $redis->getData();
        }
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getTopUsers($limit)
    {
        return $this->model->select('name')->take($limit)->orderBy('id', 'DESC')->get();
    }
}
