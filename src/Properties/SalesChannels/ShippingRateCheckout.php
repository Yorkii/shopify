<?php

namespace Yorki\Shopify\Properties\SalesChannels;

use Yorki\Shopify\Properties\Base;

/**
 * @property float $total_tax
 * @property float $total_price
 * @property float $subtotal_price
 *
 * @method float getTotalTax()
 * @method float getTotalPrice()
 * @method float getSubtotalPrice()
 *
 * @method $this setTotalTax($value)
 * @method $this setTotalPrice($value)
 * @method $this setSubtotalPrice($value)
 */
class ShippingRateCheckout extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'total_tax' => 'float',
        'total_price' => 'float',
        'subtotal_price' => 'float',
    ];
}