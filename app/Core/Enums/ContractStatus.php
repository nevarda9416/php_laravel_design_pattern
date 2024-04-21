<?php

namespace App\Enums;

enum ContractStatus: string
{
    case SUBSCRIPTION = 'subscription';
    case RUNNING = 'running';
    case STOPPING = 'stopping';
    case REQUESTING_REOPEN = 'requesting_reopen';
    case REQUESTING_LEAVE = 'requesting_leave';
    case LEAVE = 'leave';
}
