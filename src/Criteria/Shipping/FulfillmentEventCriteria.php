<?php

namespace Yorki\Shopify\Criteria\Shipping;

use Yorki\Shopify\Criteria\Base;

/**
 * @method $this whereFulfillmentId($fulfillmentId)
 * @method $this whereOrderId($orderId)
 */
class FulfillmentEventCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'fulfillment_id',
        'order_id',
    ];
}