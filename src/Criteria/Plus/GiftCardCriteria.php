<?php

namespace Yorkii\Shopify\Criteria\Plus;

use Yorkii\Shopify\Criteria\SimpleCriteria;

/**
 * @method $this whereStatus($status)
 */
class GiftCardCriteria extends SimpleCriteria
{
    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'status',
    ];
}