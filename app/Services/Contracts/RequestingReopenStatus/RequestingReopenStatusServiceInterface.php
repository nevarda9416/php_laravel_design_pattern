<?php

namespace App\Services\Contracts\RequestingReopenStatus;

interface RequestingReopenStatusServiceInterface
{
    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
