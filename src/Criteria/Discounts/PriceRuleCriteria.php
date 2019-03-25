<?php

namespace Yorki\Shopify\Criteria\Discounts;

use Yorki\Shopify\Criteria\Base;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\EndsAt;
use Yorki\Shopify\Criteria\Traits\StartsAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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