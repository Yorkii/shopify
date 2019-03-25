<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property string $code
 * @property float $amount
 * @property string $type
 *
 * @method string getCode()
 * @method float getAmount()
 * @method string getType()
 *
 * @method $this setCode($code)
 * @method $this setAmount($amount)
 * @method $this setType($type)
 */
class LineItem extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'fulfillable_quantity' => 'int',
        'grams' => 'int',
        'price' => 'float',
        'quantity' => 'int',
        'requires_shipping' => 'bool',
        'gift_card' => 'bool',
        'properties' => 'collection:property:' . NameValueProperty::class,
        'taxable' => 'bool',
        'tax_lines' => 'collection:property:' . TaxLine::class,
        'total_discount' => 'float',
        'discount_allocations' => 'collection:property:' . DiscountAllocation::class,
    ];
}