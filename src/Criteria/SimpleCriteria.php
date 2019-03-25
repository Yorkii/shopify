<?php

namespace Yorki\Shopify\Criteria;

/**
 * @method $this whereSinceId($sinceId)
 */
class SimpleCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'since_id',
    ];
}