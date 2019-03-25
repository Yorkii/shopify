<?php

namespace Yorkii\Shopify\Criteria\OnlineStore;

use Yorkii\Shopify\Criteria\SimpleCriteria;

/**
 * @method $this wherePath($path)
 * @method $this whereTarget($target)
 */
class RedirectCriteria extends SimpleCriteria
{
    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'path',
        'target',
    ];
}