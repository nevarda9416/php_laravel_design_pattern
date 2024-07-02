<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     *
     * @return mixed
     */
    public function all();

    /**
     * Get one
     *
     * @return mixed
     */
    public function find($id);

    /**
     * Create
     *
     * @param  array  $data
     * @return mixed
     */
    public function create($data = []);

    /**
     * Update
     *
     * @param  array  $data
     * @return mixed
     */
    public function update($id, $data = []);

    /**
     * Delete
     *
     * @return mixed
     */
    public function delete($id);
}
