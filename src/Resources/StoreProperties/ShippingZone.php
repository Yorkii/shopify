<?php

namespace Yorkii\Shopify\Resources\StoreProperties;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Criteria\StoreProperties\ShippingZoneCriteria;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\GetsAll;

/**
 * @property-read Collection $countries
 * @property-read Collection $provinces
 * 
 * @property int $id
 * @property string $name
 * @property array $carrier_shipping_rate_providers
 * @property array $price_based_shipping_rates
 * @property array $weight_based_shipping_rates
 * 
 * @method Collection getCountries()
 * @method Collection getProvinces() 
 * @method int getId()
 * @method string getName()
 * @method array getCarrierShippingRateProviders()
 * @method array getPriceBasedShippingRates()
 * @method array getWeightBasedShippingRates()
 *
 * @method $this setId($value)
 * @method $this setName($value)
 * @method $this setCarrierShippingRateProviders(array $value)
 * @method $this setPriceBasedShippingRates(array $value)
 * @method $this setWeightBasedShippingRates(array $value)
 *
 */
class ShippingZone extends Base
{
    use GetsAll;

    /**
     * @var string
     */
    protected $resourceName = 'shipping_zone';

    /**
     * @var array
     */
    protected $casts = [
        'countries' => 'collection:property:' . Country::class,
        'provinces' => 'collection:property:' . Province::class,
        'carrier_shipping_rate_providers' => 'array',
        'price_based_shipping_rates' => 'array',
        'weight_based_shipping_rates' => 'array',
    ];
}