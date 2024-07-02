<?php

namespace App\Services\Contracts\StoppingStatus;

use App\Enums\ContractStatus;
use App\Repositories\Contract\StatusRepositoryInterface;
use App\Services\Contracts\Status\StatusService;

class StoppingStatusService extends StatusService implements StoppingStatusServiceInterface
{
    public function __construct($newStatus)
    {
        parent::__construct();
        $this->oldStatus = [ContractStatus::RUNNING];
        $this->newStatus = $newStatus;
    }

    public function update($id, $reason): bool
    {
        return app(StatusRepositoryInterface::class)->update($id, $this->oldStatus, $this->newStatus, $reason);
    }
}
