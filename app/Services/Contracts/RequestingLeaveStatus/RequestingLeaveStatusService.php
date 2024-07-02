<?php

namespace App\Services\Contracts\RequestingLeaveStatus;

use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class RequestingLeaveStatusService extends StatusService
{
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = ContractStatus::RUNNING;
        $this->newStatus = $newStatus;
    }

    public function update($id, $reason): bool
    {
        return app(StatusRepositoryInterface::class)->update($id, $this->oldStatus, $this->newStatus, $reason);
    }
}
