<?php

namespace Yorkii\Shopify\Criteria\Orders;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereIds($ids)
 * @method $this whereStatus($status)
 */
class DraftOrderCriteria extends SimpleCriteria
{
    use UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'ids',
        'since_id',
        'status',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}