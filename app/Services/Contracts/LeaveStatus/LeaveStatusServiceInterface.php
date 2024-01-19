<?php

namespace App\Services\Contracts\LeaveStatus;

interface LeaveStatusServiceInterface
{
    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
