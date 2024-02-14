<?php

namespace App\Services\Contracts\RunningStatus;
use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class RunningStatusService extends StatusService implements RunningStatusServiceInterface
{
    /**
     * @param $newStatus
     */
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = [ContractStatus::SUBSCRIPTION->value, ContractStatus::REQUESTING_LEAVE->value];
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
