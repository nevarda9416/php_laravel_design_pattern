<?php

namespace App\Services\Contracts\RequestingLeaveStatus;
use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class RequestingLeaveStatusService extends StatusService
{
    /**
     * @param $newStatus
     */
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = ContractStatus::RUNNING;
        $this->newStatus = $newStatus;
    }

    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool
    {
        return app(StatusRepositoryInterface::class)->update($id, $this->oldStatus, $this->newStatus, $reason);
    }
}
