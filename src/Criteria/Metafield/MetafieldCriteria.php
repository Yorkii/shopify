<?php

namespace Yorki\Shopify\Criteria\Inventory;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereNamespace($namespace)
 * @method $this whereKey($key)
 * @method $this whereValueType($valueType)
 */
class MetafieldCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'namespace',
        'key',
        'value_type',
    ];
}