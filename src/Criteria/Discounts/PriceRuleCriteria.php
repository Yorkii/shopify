<?php

namespace Yorkii\Shopify\Criteria\Discounts;

use Yorkii\Shopify\Criteria\Base;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\EndsAt;
use Yorkii\Shopify\Criteria\Traits\StartsAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereSinceId($sinceId)
 * @method $this whereTimesUsed($timesUsed)
 */
class PriceRuleCriteria extends Base
{
    use CreatedAt,
        UpdatedAt,
        StartsAt,
        EndsAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'times_used',
    ];
}