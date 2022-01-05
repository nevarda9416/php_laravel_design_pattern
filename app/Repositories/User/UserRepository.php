<?php
namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Set model tương ứng
     * @return string
     */
    public function setModel()
    {
        return User::class;
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
