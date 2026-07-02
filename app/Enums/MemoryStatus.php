<?php

namespace App\Enums;

enum MemoryStatus: string
{
    case Pending = 'pending';
    case Analyzed = 'analyzed';
    case Failed = 'failed';
}