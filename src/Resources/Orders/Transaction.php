<?php

namespace Yorki\Shopify\Resources\Orders;

use Yorki\Shopify\Criteria\Orders\TransactionCriteria;
use Yorki\Shopify\Properties\Orders\PaymentDetails;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\Depends;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read PaymentDetails $payment_details
 *
 * @property int $id
 * @property float $amount
 * @property int $device_id
 * @property int $order_id
 * @property int $parent_id
 * @property array $receipt
 * @property bool $test
 * @property int $user_id
 * @property string $authorization
 * @property string $currency
 * @property string $error_code
 * @property string $gateway
 * @property string $kind
 * @property string $message
 * @property string $source_name
 * @property string $status
 * 
 * @method Carbon getCreatedAt()
 * @method PaymentDetails getPaymentDetails()
 * @method int getId()
 * @method float getAmount()
 * @method int getDeviceId()
 * @method int getOrderId()
 * @method int getParentId()
 * @method array getReceipt()
 * @method bool getTest()
 * @method int getUserId()
 * @method string getAuthorization()
 * @method string getCurrency()
 * @method string getErrorCode()
 * @method string getGateway()
 * @method string getKind()
 * @method string getMessage()
 * @method string getSourceName()
 * @method string getStatus()
 *
 * @method $this setId($id)
 * @method $this setAmount($amount)
 * @method $this setDeviceId($deviceId)
 * @method $this setOrderId($orderId)
 * @method $this setParentId($parentId)
 * @method $this setReceipt($receipt)
 * @method $this setTest($test)
 * @method $this setUserId($userId)
 * @method $this setAuthorization($authorization)
 * @method $this setCurrency($currency)
 * @method $this setErrorCode($errorCode)
 * @method $this setGateway($gateway)
 * @method $this setKind($kind)
 * @method $this setMessage($message)
 * @method $this setSourceName($sourceName)
 * @method $this setStatus($status)
 */
class Transaction extends Base
{
    use GetsAll,
        GetsSingle,
        Counts,
        Creates,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'transaction';

    /**
     * @var string
     */
    protected $endpoint = 'admin/orders/:order_id/transactions';

    /**
     * @var array
     */
    protected $depends = [
        'order_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'payment_details' => 'property:' . PaymentDetails::class,
        'receipt' => 'array',
        'test' => 'bool',
    ];

    /**
     * @return TransactionCriteria
     */
    public function criteria()
    {
        return new TransactionCriteria($this->client);
    }
}