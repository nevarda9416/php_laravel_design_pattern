<?php

namespace App\Services\Contracts\RequestingReopenStatus;

interface RequestingReopenStatusServiceInterface
{
    public function update($id, $reason): bool;
}
