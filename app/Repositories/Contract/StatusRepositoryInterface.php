<?php

namespace App\Repositories\Contract;

interface StatusRepositoryInterface
{
    public function update($id, $oldStatus, $newStatus, $reason): int;
}
