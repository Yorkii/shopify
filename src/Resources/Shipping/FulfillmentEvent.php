<?php

namespace Yorki\Shopify\Resources\Shipping;

use Yorki\Shopify\Criteria\Shipping\FulfillmentEventCriteria;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\Deletes;
use Yorki\Shopify\Resources\Traits\Depends;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $estimated_delivery_at
 * @property-read Carbon $happened_at
 *
 * @property int $id
 * @property int $shop_id
 * @property int $order_id
 * @property int $fulfillment_id
 * @property string $status
 * @property string $message
 * @property string $city
 * @property string $province
 * @property string $zip
 * @property string $country
 * @property string $address1
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getEstimatedDeliveryAt()
 * @method Carbon getHappenedAt()
 * @method int getId()
 * @method int getShopId()
 * @method int getOrderId()
 * @method int getFulfillmentId()
 * @method string getStatus()
 * @method string getMessage()
 * @method string getCity()
 * @method string getProvince()
 * @method string getZip()
 * @method string getCountry()
 * @method string getAddress1()
 *
 * @method $this setId($id)
 * @method $this setShopId($shopId)
 * @method $this setOrderId($orderId)
 * @method $this setFulfillmentId($fulfillmentId)
 * @method $this setStatus($status)
 * @method $this setMessage($message)
 * @method $this setCity($city)
 * @method $this setProvince($province)
 * @method $this setZip($zip)
 * @method $this setCountry($country)
 * @method $this setAddress1($address1)
 */
class FulfillmentEvent extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Deletes,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'fulfillment_event';

    /**
     * @var string
     */
    protected $endpoint = 'admin/orders/:order_id/fulfillments/:fulfillment_id/events';

    /**
     * @var array
     */
    protected $depends = [
        'order_id',
        'fulfillment_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    /**
     * @return FulfillmentEventCriteria
     */
    public function criteria()
    {
        return new FulfillmentEventCriteria($this->client);
    }
}