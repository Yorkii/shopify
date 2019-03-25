<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property int $order_id
 * @property float $amount
 * @property string $kind
 * @property string $gateway
 * @property int $parent_id
 * @property float $maximum_refundable
 * 
 * @method int getOrderId()
 * @method float getAmount()
 * @method string getKind()
 * @method string getGateway()
 * @method int getParentId()
 * @method float getMaximumRefundable()
 * 
 * @method $this setOrderId($orderId)
 * @method $this setAmount($amount)
 * @method $this setKind($kind)
 * @method $this setGateway($gateway)
 * @method $this setParentId($parentId)
 * @method $this setMaximumRefundable($maximumRefundable)
 */
class CalculatedRefundTransaction extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'amount' => 'float',
        'maximum_refundable' => 'float',
    ];
}