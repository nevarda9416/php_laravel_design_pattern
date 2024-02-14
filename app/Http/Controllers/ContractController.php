<?php

namespace App\Http\Controllers;

use App\Services\Contracts\Status\StatusServiceInterface;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request): mixed
    {
        $id = data_get($request->toArray(), 'id');
        $status = data_get($request->toArray(), 'status');
        $reason = data_get($request->toArray(), 'reason');
        $statusInstance = app(StatusServiceInterface::class)->getStatus($id, $status);
        return $statusInstance->update($id, $status, $reason);
    }
}
