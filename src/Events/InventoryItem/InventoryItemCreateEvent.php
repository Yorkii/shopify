<?php

namespace Yorkii\Shopify\Events\InventoryItem;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property int $id
 * @property string $sku
 * @property bool $tracked
 *
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getId()
 * @method string getSku()
 * @method bool getTracked()
 */
class InventoryItemCreateEvent extends Base
{
    const EVENT_TOPIC = 'inventory_items/create';

    /**
     * @var array
     */
    protected $casts = [
        'tracked' => 'bool',
    ];
}