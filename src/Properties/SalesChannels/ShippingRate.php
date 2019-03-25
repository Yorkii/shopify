<?php

namespace Yorkii\Shopify\Properties\SalesChannels;

use Yorkii\Shopify\Properties\Base;

/**
 * @property-read ShippingRateCheckout $checkout
 * 
 * @property string $id
 * @property float $price
 * @property string $title
 * @property bool $phone_required
 * @property string $delivery_range
 * @property string $handle
 * 
 * @method ShippingRateCheckout getCheckout() 
 * @method string getId()
 * @method float getPrice()
 * @method string getTitle()
 * @method bool getPhoneRequired()
 * @method string getDeliveryRange()
 * @method string getHandle()
 * 
 * @method $this setId($value)
 * @method $this setPrice($value)
 * @method $this setTitle($value)
 * @method $this setPhoneRequired($value)
 * @method $this setDeliveryRange($value)
 * @method $this setHandle($value)
 */
class ShippingRate extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'id' => 'string',
        'price' => 'float',
        'checkout' => 'property:' . ShippingRateCheckout::class,
        'phone_required' => 'bool',
    ];
}