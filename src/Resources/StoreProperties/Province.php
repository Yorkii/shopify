<?php

namespace Yorkii\Shopify\Resources\StoreProperties;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\Depends;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use Yorkii\Shopify\Resources\Traits\Updates;

/**
 * @property int $id
 * @property int $country_id
 * @property int $shipping_zone_id
 * @property string $name
 * @property float $tax
 * @property float $tax_percentage
 * @property string $code
 * @property string $tax_name
 * @property string $tax_type
 * 
 * @method int getId()
 * @method int getShippingZoneId()
 * @method int getCountryId()
 * @method string getName()
 * @method float getTax()
 * @method float getTaxPercentage()
 * @method string getCode()
 * @method string getTaxName()
 * @method string getTaxType()
 * 
 * @method $this setId($value)
 * @method $this setShippingZoneId($value)
 * @method $this setCountryId($value)
 * @method $this setName($value)
 * @method $this setTax($value)
 * @method $this setTaxPercentage($value)
 * @method $this setCode($value)
 * @method $this setTaxName($value)
 * @method $this setTaxType($value)
 */
class Province extends Base
{
    use GetsAll,
        GetsSingle,
        Updates,
        Counts,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'province';

    /**
     * @var string
     */
    protected $endpoint = 'admin/countries/:country_id/provinces';

    /**
     * @var array
     */
    protected $depends = [
        'country_id',
    ];

    /**
     * @var array 
     */
    protected $casts = [
        'tax' => 'float',
        'tax_percentage' => 'array',
    ];
}