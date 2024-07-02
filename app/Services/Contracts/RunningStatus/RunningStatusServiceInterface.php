<?php

namespace App\Services\Contracts\RunningStatus;

interface RunningStatusServiceInterface
{
    public function update($id, $reason): bool;
}
