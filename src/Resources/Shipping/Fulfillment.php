<?php

namespace Yorki\Shopify\Resources\Shipping;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Shipping\FulfillmentCriteria;
use Yorki\Shopify\Properties\Orders\LineItem;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Cancels;
use Yorki\Shopify\Resources\Traits\Completes;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\CreatesAndSaves;
use Yorki\Shopify\Resources\Traits\Depends;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use Yorki\Shopify\Resources\Traits\Opens;
use Yorki\Shopify\Resources\Traits\Passes;
use Yorki\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Collection $line_items
 *
 * @property bool $notify_customer
 * @property array $receipt
 * @property array $tracking_numbers
 * @property array $tracking_urls
 * @property int $id
 * @property int $location_id
 * @property int $order_id
 * @property string $name
 * @property string $service
 * @property string $shipment_status
 * @property string $status
 * @property string $tracking_company
 * @property string $variant_inventory_management 
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Collection getLineItems() 
 * @method bool getNotifyCustomer()
 * @method array getReceipt()
 * @method array getTrackingNumbers()
 * @method array getTrackingUrls()
 * @method int getId()
 * @method int getLocationId()
 * @method int getOrderId()
 * @method string getName()
 * @method string getService()
 * @method string getShipmentStatus()
 * @method string getStatus()
 * @method string getTrackingCompany()
 * @method string getVariantInventoryManagement()
 *
 * @method $this setNotifyCustomer()
 * @method $this setReceipt(array $receipt)
 * @method $this setTrackingNumbers(array $trackingNumbers)
 * @method $this setTrackingUrls(array $trackingUrls)
 * @method $this setId($id)
 * @method $this setLocationId($locationId)
 * @method $this setOrderId($orderId)
 * @method $this setName($name)
 * @method $this setService($service)
 * @method $this setShipmentStatus($shipmentStatus)
 * @method $this setStatus($status)
 * @method $this setTrackingCompany($trackingCompany)
 * @method $this setVariantInventoryManagement($variantInventoryManagement)
 */
class Fulfillment extends Base
{
    use GetsAll,
        GetsSingle,
        CreatesAndSaves,
        Counts,
        Completes,
        Opens,
        Cancels,
        Depends,
        Provides,
        Passes;

    /**
     * @var string
     */
    protected $resourceName = 'fulfillment';

    /**
     * @var string
     */
    protected $endpoint = 'admin/orders/:order_id:/fulfillments';

    /**
     * @var array
     */
    protected $depends = [
        'order_id',
    ];

    /**
     * @var array
     */
    protected $provides = [
        'fulfillment_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $passes = [
        'order_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'line_items' => 'collection:property:' . LineItem::class,
        'notify_customer' => 'bool',
        'receipt' => 'array',
        'tracking_numbers' => 'array',
        'tracking_urls' => 'array',
    ];

    /**
     * @return FulfillmentCriteria
     */
    public function criteria()
    {
        return new FulfillmentCriteria($this->client);
    }
}