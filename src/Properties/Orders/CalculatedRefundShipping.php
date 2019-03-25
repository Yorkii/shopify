<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property float $amount
 * @property float $tax
 * @property float $maximum_refundable
 *
 * @method float getAmount()
 * @method float getTax()
 * @method float getMaximumRefundable()
 * 
 * @method $this setAmount($amount)
 * @method $this setTax($tax)
 * @method $this setMaximumRefundable($maximumRefundable)
 */
class CalculatedRefundShipping extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'tax' => 'float',
        'maximum_refundable' => 'float',
    ];
}