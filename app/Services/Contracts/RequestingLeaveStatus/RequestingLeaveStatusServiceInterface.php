<?php

namespace App\Services\Contracts\RequestingLeaveStatus;

interface RequestingLeaveStatusServiceInterface
{
    public function update($id, $reason): bool;
}
