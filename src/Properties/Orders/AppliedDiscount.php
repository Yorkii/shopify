<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property float $value
 * @property float $amount
 * @property string $title
 * @property string $description
 * @property string $value_type
 * 
 * @method float getValue()
 * @method float getAmount()
 * @method string getTitle()
 * @method string getDescription()
 * @method string getValueType()
 * 
 * @method $this setValue($value)
 * @method $this setAmount($amount)
 * @method $this setTitle($title)
 * @method $this setDescription($description)
 * @method $this setValueType($valueType)
 */
class AppliedDiscount extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'value' => 'float',
        'amount' => 'float',
    ];
}