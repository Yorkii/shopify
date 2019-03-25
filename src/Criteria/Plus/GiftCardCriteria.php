<?php

namespace Yorki\Shopify\Criteria\Plus;

use Yorki\Shopify\Criteria\SimpleCriteria;

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