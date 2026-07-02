<?php
namespace App\Filters\V1;

use App\Filters\ApiFilter;

class EventsFilter extends ApiFilter
{
    protected $safeParams = [
        'contactId' => ['eq'],
        'date' => ['eq', 'gt', 'lt', 'lte', 'gte'],
        'title' => ['eq'],
        'description' => ['eq'],
        'isReccuring' => ['eq'],
    ];

    protected $columnMap = [
        'contactId' => 'contact_id',
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
