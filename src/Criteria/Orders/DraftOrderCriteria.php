<?php

namespace Yorki\Shopify\Criteria\Orders;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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