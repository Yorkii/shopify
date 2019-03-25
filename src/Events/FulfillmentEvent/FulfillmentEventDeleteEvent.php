<?php

namespace Yorki\Shopify\Events\FulfillmentEvent;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property Carbon $happened_at
 * @property Carbon $estimated_delivery_at
 * @property int $id
 * @property int $fulfillment_id
 * @property int $order_id 
 * @property string $status
 * @property string $message
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $zip
 * @property string $address1
 * @property float $latitude
 * @property float $longitude
 * @property int $shop_id
 *
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Carbon getHappenedAt()
 * @method Carbon getEstimatedDeliveryAt()
 * @method int getId()
 * @method int getFulfillmentId()
 * @method int getOrderId()
 * @method string getStatus()
 * @method string getMessage()
 * @method string getCity()
 * @method string getProvince()
 * @method string getCountry()
 * @method string getZip()
 * @method string getAddress1()
 * @method float getLatitude()
 * @method float getLongitude()
 * @method int getShopId()
 */
class FulfillmentEventDeleteEvent extends Base
{
    const EVENT_TOPIC = 'fulfillment_events/delete';
}