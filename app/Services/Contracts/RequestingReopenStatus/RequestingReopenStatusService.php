<?php

namespace App\Services\Contracts\RequestingReopenStatus;

use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class RequestingReopenStatusService extends StatusService implements RequestingReopenStatusServiceInterface
{
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = ContractStatus::STOPPING->value;
        $this->newStatus = $newStatus;
    }

    public function update($id, $reason): bool
    {
        return app(StatusRepositoryInterface::class)->update($id, $this->oldStatus, $this->newStatus, $reason);
    }
}
