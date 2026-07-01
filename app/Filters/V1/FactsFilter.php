<?php
namespace App\Filters\V1;

use App\Filters\ApiFilter;

class FactsFilter extends ApiFilter
{
    protected $safeParams = [
        'memoryId' => ['eq'],
        'type' => ['eq'],
        'attribute' => ['eq'],
        'value' => ['eq'],
    ];

    protected $columnMap = [
        'memoryId' => 'memory_id',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
        // 'like' => '...'
    ];
}
