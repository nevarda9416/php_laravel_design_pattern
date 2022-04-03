<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

abstract class Repository implements RepositoryInterface
{
    // Model tương tác
    /**
     * @var
     */
    protected $model;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->getModel();
    }

    // Lấy model tương ứng
    /**
     * @return mixed
     */
    abstract public function setModel();

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function getModel()
    {
        $this->model = app()->make(
            $this->setModel()
        );
    }

    /**
     * Get all
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create($data = [])
    {
        try {
            return $this->model->create($data);
        } catch (ModelNotFoundException $exception) {
            abort(422, 'Invalid input data');
        } catch (Exception $exception) {
            abort(500, 'Could not create user');
        }
    }

    /**
     * Update
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = [])
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->model->update($data);
            return $result;
        }
        return false;
    }

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->model->delete($id);
            return true;
        }
        return false;
    }
}
