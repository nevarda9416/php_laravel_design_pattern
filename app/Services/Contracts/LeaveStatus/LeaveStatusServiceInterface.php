<?php

namespace App\Services\Contracts\LeaveStatus;

interface LeaveStatusServiceInterface
{
    public function update($id, $reason): bool;
}
