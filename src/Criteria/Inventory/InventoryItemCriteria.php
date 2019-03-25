<?php

namespace Yorki\Shopify\Criteria\Inventory;

use Yorki\Shopify\Criteria\Base;

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