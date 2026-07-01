<?php
namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ContactsFilter extends ApiFilter
{
    protected $safeParams = [
        'ownerId' => ['eq'],
        'userId' => ['eq'],
        'name' => ['eq'],
        'birthdate' => ['eq', 'gt', 'lt', 'lte', 'gte'],
    ];

    protected $columnMap = [
        'ownerId' => 'owner_id',
        'userId' => 'user_id',
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
