<?php

namespace Yorkii\Shopify\Properties\Orders;

use Yorkii\Shopify\Properties\Base;

/**
 * @property int $id
 * @property int $order_id
 * @property int $refund_id
 * @property float $amount
 * @property float $tax_amount
 * @property string $kind
 * @property string $reason
 * 
 * @method int getId()
 * @method int getOrderId()
 * @method int getRefundId()
 * @method float getAmount()
 * @method float getTaxAmount()
 * @method string getKind()
 * @method string getReason()
 *
 * @method $this setId($id)
 * @method $this setOrderId($orderId)
 * @method $this setRefundId($refundId)
 * @method $this setAmount($amount)
 * @method $this setTaxAmount($taxAmount)
 * @method $this setKind($kind)
 * @method $this setReason($reason)
 */
class OrderAdjustment extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'tax_amount' => 'float',
    ];
}