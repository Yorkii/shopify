<?php

namespace Yorki\Shopify\Criteria\Orders;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereStatus($status)
 */
class AbandonedCheckoutsCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'status',
    ];
}