<?php

namespace Yorkii\Shopify\Resources\Shipping;

use Yorkii\Shopify\Criteria\Shipping\FulfillmentServiceCriteria;
use Yorkii\Shopify\Resources\BaseResource;

/**
 * @property bool $inventory_management
 * @property bool $requires_shipping_method
 * @property bool $tracking_support
 * @property string $callback_url
 * @property string $format
 * @property string $handle
 * @property int $location_id
 * @property string $name
 * @property string $provider_id
 *
 * @method bool getInventoryManagement()
 * @method bool getRequiresShippingMethod()
 * @method bool getTrackingSupport()
 * @method string getCallbackUrl()
 * @method string getFormat()
 * @method string getHandle()
 * @method int getLocationId()
 * @method string getName()
 * @method string getProviderId()
 * 
 * @method $this setInventoryManagement()
 * @method $this setRequiresShippingMethod()
 * @method $this setTrackingSupport()
 * @method $this setCallbackUrl()
 * @method $this setFormat()
 * @method $this setHandle()
 * @method $this setLocationId()
 * @method $this setName()
 * @method $this setProviderId()
 */
class FulfillmentService extends BaseResource
{
    /**
     * @var string
     */
    protected $resourceName = 'fulfillment_service';

    /**
     * @var array
     */
    protected $casts = [
        'provider_id' => 'string',
        'inventory_management' => 'bool',
        'requires_shipping_method' => 'bool',
        'tracking_support' => 'bool',
    ];

    /**
     * @return FulfillmentServiceCriteria
     */
    public function criteria()
    {
        return new FulfillmentServiceCriteria($this->client);
    }
}