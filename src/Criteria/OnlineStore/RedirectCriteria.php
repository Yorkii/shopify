<?php

namespace Yorki\Shopify\Criteria\OnlineStore;

use Yorki\Shopify\Criteria\SimpleCriteria;

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