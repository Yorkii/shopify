<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property float $amount
 * @property float $discount_application_index
 *
 * @method float getAmount()
 * @method float getDiscountApplicationIndex()
 *
 * @method $this setAmount($amount)
 * @method $this setDiscountApplicationIndex($discountApplicationIndex)
 */
class DiscountAllocation extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'discount_application_index' => 'int',
    ];
}