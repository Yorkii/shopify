<?php

namespace Yorki\Shopify\Criteria\Inventory;

use Yorki\Shopify\Criteria\Base;

/**
 * @method $this whereInventoryItemIds($inventoryItemIds)
 * @method $this whereLocationIds($locationIds)
 */
class InventoryLevelCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'inventory_item_ids',
        'location_ids',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'inventory_item_ids' => 'comma_separated',
        'location_ids' => 'comma_separated',
    ];
}