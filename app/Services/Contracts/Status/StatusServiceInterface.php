<?php

namespace App\Services\Contracts\Status;

interface StatusServiceInterface
{
    public function getStatus($status): mixed;

    public function update($id, $reason): bool;
}
