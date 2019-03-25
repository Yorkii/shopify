<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Properties\Base;

/**
 * @property string $code
 * @property float $price
 * @property string $source
 * @property string $title
 * @property Collection $tax_lines
 * @property string $carrier_identifier
 * @property string $requested_fulfillment_service_id
 *
 * @method string getCode()
 * @method float getPrice()
 * @method string getSource()
 * @method string getTitle()
 * @method Collection getTaxLines()
 * @method string getCarrierIdentifier()
 * @method string getRequestedFulfillmentServiceId()
 * 
 * @method $this setCode($code)
 * @method $this setPrice($price)
 * @method $this setSource($source)
 * @method $this setTitle($title)
 * @method $this setCarrierIdentifier($carrierIdentifier)
 * @method $this setRequestedFulfillmentServiceId($requestedFulfillmentServiceId)
 */
class ShippingLine extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'tax_lines' => 'collection:property:' . TaxLine::class,
    ];
}