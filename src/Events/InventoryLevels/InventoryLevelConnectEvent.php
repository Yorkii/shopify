<?php

namespace Yorki\Shopify\Events\InventoryItem;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property int $inventory_item_id
 * @property int $location_id
 * @property int $available
 * @property string $admin_graphql_api_id
 *
 * @method Carbon getUpdatedAt()
 * @method int getInventoryItemId()
 * @method int getLocationId()
 * @method int getAvailable()
 * @method string getAdminGraphqlApiId()
 */
class InventoryLevelConnectEvent extends Base
{
    const EVENT_TOPIC = 'inventory_levels/connect';
}