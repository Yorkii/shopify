<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property-read LineItem $line_item
 * 
 * @property int $id
 * @property int $line_item_id
 * @property int $quantity
 * @property int $location_id
 * @property string $restock_type
 * 
 * @method LineItem getLineItem()
 * @method int getId()
 * @method int getLineItemId()
 * @method int getQuantity()
 * @method int getLocationId()
 * @method string getRestockType()
 *
 * @method $this setId($id)
 * @method $this setLineItemId($lineItemId)
 * @method $this setQuantity($quantity)
 * @method $this setLocationId($locationId)
 * @method $this setRestockType($restockType)
 */
class RefundLineItem extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'line_item' => 'property:' . LineItem::class,
        'quantity' => 'int',
    ];
}