<?php

namespace Yorki\Shopify\Criteria\Customers;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereIds($ids)
 */
class CustomerCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'ids',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}