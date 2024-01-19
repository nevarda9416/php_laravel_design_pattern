<?php

namespace App\Services\Contracts\RunningStatus;

interface RunningStatusServiceInterface
{
    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
