<?php

namespace Yorki\Shopify\Events\OrderTransaction;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property int $id
 * @property int $order_id
 * @property float $amount
 * @property string $kind
 * @property string $gateway
 * @property string $status
 * @property string $message
 * @property bool $test
 * @property string $authorization
 * @property string $currency
 * @property int $location_id
 * @property int $user_id
 * @property int $parent_id
 * @property string $device_id
 * @property array $receipt
 * @property string $error_code
 * @property string $source_name
 * @property array $payment_details
 *
 * @method Carbon getCreatedAt()
 * @method int getId()
 * @method string get()
 * @method int getOrderId()
 * @method float getAmount()
 * @method string getKind()
 * @method string getGateway()
 * @method string getStatus()
 * @method string getMessage()
 * @method bool getTest()
 * @method string getAuthorization()
 * @method string getCurrency()
 * @method int getLocationId()
 * @method int getUserId()
 * @method int getParentId()
 * @method string getDeviceId()
 * @method array getReceipt()
 * @method string getErrorCode()
 * @method string getSourceName()
 * @method array getPaymentDetails()
 */
class OrderTransactionCreateEvent extends Base
{
    const EVENT_TOPIC = 'order_transactions/create';

    /**
     * @var array 
     */
    protected $casts = [
        'device_id' => 'string',
    ];
}