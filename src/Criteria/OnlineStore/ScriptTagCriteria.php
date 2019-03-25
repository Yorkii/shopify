<?php

namespace Yorki\Shopify\Criteria\OnlineStore;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereSrc($src)
 */
class ScriptTagCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'src',
    ];
}