<?php

namespace Yorki\Shopify\Events\Fulfillment;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Events\Base;
use Yorki\Shopify\Events\Schema\Address;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property Carbon $completed_at
 * @property Carbon $invoice_sent_at
 * @property Collection $line_items
 * @property Address $destination
 * @property int $id
 * @property int $order_id
 * @property int $location_id
 * @property string $service
 * @property string $tracking_company
 * @property string $shipment_status
 * @property string $email
 * @property string $tracking_number
 * @property array $tracking_numbers
 * @property string $tracking_url
 * @property array $tracking_urls
 * @property array $receipt
 * @property string $name
 *
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Carbon getCompletedAt()
 * @method Carbon getInvoiceSentAt()
 * @method Collection getLineItems()
 * @method Address getDestination()
 * @method int getId()
 * @method int getOrderId()
 * @method int getLocationId()
 * @method string getService()
 * @method string getTrackingCompany()
 * @method string getShipmentStatus()
 * @method string getEmail()
 * @method string getTrackingNumber()
 * @method array getTrackingNumbers()
 * @method string getTrackingUrl()
 * @method array getTrackingUrls()
 * @method array getReceipt()
 * @method string getName()
 */
class FulfillmentUpdateEvent extends Base
{
    const EVENT_TOPIC = 'fulfillments/update';
}