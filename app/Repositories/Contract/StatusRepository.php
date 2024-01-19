<?php

namespace App\Repositories\Contract;

use Illuminate\Support\Facades\DB;

class StatusRepository implements StatusRepositoryInterface
{
    /**
     * @param $id
     * @param $oldStatus
     * @param $newStatus
     * @param $reason
     * @return int
     */
    public function update($id, $oldStatus, $newStatus, $reason): int
    {
        return DB::table('contracts')->where('id', $id)->whereIn('status', $oldStatus)->update([
            'status' => $newStatus,
            'reason' => $reason,
        ]);
    }
}
