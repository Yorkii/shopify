<?php

namespace Yorkii\Shopify\Resources\Shipping;

use Yorkii\Shopify\Criteria\Shipping\CarrierServiceCriteria;
use Yorkii\Shopify\Resources\BaseResource;

/**
 * @property bool $active
 * @property bool $service_discovery
 * @property string $callback_url
 * @property string $carrier_service_type
 * @property string $format
 * @property string $name
 * 
 * @method bool getActive()
 * @method bool getServiceDiscovery()
 * @method string getCallbackUrl()
 * @method string getCarrierServiceType()
 * @method string getFormat()
 * @method string getName()
 * 
 * @method $this setActive($active)
 * @method $this setServiceDiscovery($serviceDiscovery)
 * @method $this setCallbackUrl($callbackUrl)
 * @method $this setCarrierServiceType($carrierServiceType)
 * @method $this setFormat($format)
 * @method $this setName($name)
 */
class CarrierService extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceName = 'carrier_service';

    /**
     * @var array
     */
    protected $casts = [
        'active' => 'bool',
        'service_discovery' => 'bool',
    ];
}