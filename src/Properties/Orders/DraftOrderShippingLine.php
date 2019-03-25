<?php

namespace Yorkii\Shopify\Properties\Orders;

use Yorkii\Shopify\Properties\Base;

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