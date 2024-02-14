<?php

namespace App\Services\Contracts\RequestingLeaveStatus;

interface RequestingLeaveStatusServiceInterface
{
    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
