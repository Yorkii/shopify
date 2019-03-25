<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property string $code
 * @property float $price
 * @property string $source
 * @property string $title
 * @property string $id
 * @property array $applied_discounts
 *
 * @method string getCode()
 * @method float getPrice()
 * @method string getSource()
 * @method string getTitle()
 * @method string getId()
 * @method array getAppliedDiscounts()
 *
 * @method $this setCode($code)
 * @method $this setPrice($price)
 * @method $this setSource($source)
 * @method $this setTitle($title)
 * @method $this setId($id)
 * @method $this setAppliedDiscounts($appliedDiscounts)
 * 
 */
class AbandonedCheckoutShippingLine extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'price' => 'float',
        'applied_discounts' => 'array',
        'id' => 'string',
    ];
}