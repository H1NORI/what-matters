<?php
namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ContactsFilter extends ApiFilter
{
    protected $safeParams = [
        'contactId' => ['eq'],
        'content' => ['eq'],
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
