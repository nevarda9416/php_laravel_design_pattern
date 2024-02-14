<?php

namespace App\Services\Contracts\Status;

interface StatusServiceInterface
{
    /**
     * @param $status
     * @return mixed
     */
    public function getStatus($status): mixed;

    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
