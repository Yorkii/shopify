<?php

namespace Yorki\Shopify\Properties\SalesChannels;

use Yorki\Shopify\Properties\Base;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $first_digits
 * @property string $last_digits
 * @property string $brand
 * @property int $expiry_month
 * @property int $expiry_year
 * 
 * @method string getFirstName()
 * @method string getLastName()
 * @method string getFirstDigits()
 * @method string getLastDigits()
 * @method string getBrand()
 * @method int getExpiryMonth()
 * @method int getExpiryYear()
 * 
 * @method $this setFirstName($value)
 * @method $this setLastName($value)
 * @method $this setFirstDigits($value)
 * @method $this setLastDigits($value)
 * @method $this setBrand($value)
 * @method $this setExpiryMonth($value)
 * @method $this setExpiryYear($value)
 */
class CreditCard extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'expiry_month' => 'int',
        'expiry_year' => 'int',
    ];
}