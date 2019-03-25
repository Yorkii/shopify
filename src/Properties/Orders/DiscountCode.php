<?php

namespace Yorkii\Shopify\Properties\Orders;

use Yorkii\Shopify\Properties\Base;

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
class DiscountCode extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
    ];
}