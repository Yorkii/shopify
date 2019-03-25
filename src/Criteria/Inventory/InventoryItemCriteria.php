<?php

namespace Yorkii\Shopify\Criteria\Inventory;

use Yorkii\Shopify\Criteria\Base;

/**
 * @method $this whereIds($ids)
 */
class InventoryItemCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'ids',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}