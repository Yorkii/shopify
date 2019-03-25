<?php

namespace Yorkii\Shopify\Criteria\Inventory;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

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