<?php
namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function all();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create($data = []);

    /**
     * Update
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
