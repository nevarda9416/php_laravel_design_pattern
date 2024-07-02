<?php

namespace App\Services\Contracts\LeaveStatus;

use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class LeaveStatusService extends StatusService implements LeaveStatusServiceInterface
{
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = ContractStatus::REQUESTING_LEAVE;
        $this->newStatus = $newStatus;
    }

    public function update($id, $reason): bool
    {
        return app(StatusRepositoryInterface::class)->update($id, $this->oldStatus, $this->newStatus, $reason);
    }
}
