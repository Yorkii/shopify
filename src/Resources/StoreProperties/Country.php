<?php

namespace Yorki\Shopify\Resources\StoreProperties;

use Yorki\Shopify\Criteria\StoreProperties\CountryCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Provides;

/**
 * @property int $id
 * @property int $shipping_zone_id
 * @property string $name
 * @property float $tax
 * @property string $code
 * @property string $tax_name
 * @property array $provinces
 * 
 * @method int getId()
 * @method int getShippingZoneId()
 * @method string getName()
 * @method float getTax()
 * @method string getCode()
 * @method string getTaxName()
 * @method array getProvinces()
 * 
 * @method $this setId($value)
 * @method $this setShippingZoneId($value)
 * @method $this setName($value)
 * @method $this setTax($value)
 * @method $this setCode($value)
 * @method $this setTaxName($value)
 * @method $this setProvinces(array $value)
 */
class Country extends BaseResource
{
    use Counts,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'country';

    /**
     * @var string
     */
    protected $plural = 'countries';

    /**
     * @var array
     */
    protected $provides = [
        'country_id' => 'id',
    ];

    /**
     * @var array 
     */
    protected $casts = [
        'tax' => 'float',
        'provinces' => 'array',
    ];

    /**
     * @return CountryCriteria
     */
    public function criteria()
    {
        return new CountryCriteria($this->client);
    }
}