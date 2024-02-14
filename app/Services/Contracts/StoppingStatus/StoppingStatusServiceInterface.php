<?php

namespace App\Services\Contracts\StoppingStatus;

interface StoppingStatusServiceInterface
{
    /**
     * @param $id
     * @param $reason
     * @return bool
     */
    public function update($id, $reason): bool;
}
