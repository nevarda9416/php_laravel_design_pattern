<?php

namespace App\Services\Contracts\StoppingStatus;

interface StoppingStatusServiceInterface
{
    public function update($id, $reason): bool;
}
