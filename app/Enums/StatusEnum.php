<?php

namespace App\Enums;

enum StatusEnum: string
{
    case PENDING    = 'pending';
    case ACTIVE     = 'active';
    case ACTIVATED  = 'activated';
    case SUCCESS    = 'success';
    case FAILED     = 'failed';
    case BLOCKED    = 'blocked';
    case SUSPENDED  = 'suspended';
    case NOTFOUND   = 'notfound';
}
