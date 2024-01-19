<?php

namespace App\Repositories\Contract;
interface StatusRepositoryInterface
{
    /**
     * @param $id
     * @param $oldStatus
     * @param $newStatus
     * @param $reason
     * @return int
     */
    public function update($id, $oldStatus, $newStatus, $reason): int;
}
