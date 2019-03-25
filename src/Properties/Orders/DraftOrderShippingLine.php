<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property string $title
 * @property string $handle
 * @property float $price
 * @property bool $custom
 *
 * @method float getPrice()
 * @method string getTitle()
 * @method string getHandle()
 * @method bool getCustom()
 *
 * @method $this setPrice($price)
 * @method $this setTitle($title)
 * @method $this setHandle($handle)
 * @method $this setCustom($custom)
 * 
 */
class DraftOrderShippingLine extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'custom' => 'bool',
    ];
}