<?php

namespace App\Services\Contracts\Status;

use App\Enums\ContractStatus;
use App\Services\Contracts\LeaveStatus\LeaveStatusServiceInterface;
use App\Services\Contracts\RequestingLeaveStatus\RequestingLeaveStatusServiceInterface;
use App\Services\Contracts\RequestingReopenStatus\RequestingReopenStatusServiceInterface;
use App\Services\Contracts\RunningStatus\RunningStatusServiceInterface;
use App\Services\Contracts\StoppingStatus\StoppingStatusServiceInterface;
use UnexpectedValueException;

abstract class StatusService implements StatusServiceInterface
{
    /**
     * @var string
     */
    public $oldStatus;

    public $newStatus;

    public function __construct()
    {
        $this->oldStatus = ContractStatus::SUBSCRIPTION->value;
    }

    public function getStatus($status): mixed
    {
        return match ($status) {
            ContractStatus::RUNNING => app(RunningStatusServiceInterface::class),
            ContractStatus::STOPPING => app(StoppingStatusServiceInterface::class),
            ContractStatus::REQUESTING_REOPEN => app(RequestingReopenStatusServiceInterface::class),
            ContractStatus::REQUESTING_LEAVE => app(RequestingLeaveStatusServiceInterface::class),
            ContractStatus::LEAVE => app(LeaveStatusServiceInterface::class),
            default => throw new UnexpectedValueException('Unexpected match value'),
        };
    }

    abstract public function update($id, $reason): bool;
}
