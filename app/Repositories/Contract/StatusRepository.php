<?php

namespace App\Repositories\Contract;

use Illuminate\Support\Facades\DB;

class StatusRepository implements StatusRepositoryInterface
{
    public function update($id, $oldStatus, $newStatus, $reason): int
    {
        return DB::table('contracts')->where('id', $id)->whereIn('status', $oldStatus)->update([
            'status' => $newStatus,
            'reason' => $reason,
        ]);
    }
}
