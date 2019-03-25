<?php

namespace Yorkii\Shopify\Resources\SalesChannels;

use Yorkii\Shopify\Properties\SalesChannels\CreditCard;
use Yorkii\Shopify\Properties\SalesChannels\Transaction;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\Creates;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;

/**
 * @property-read CreditCard $credit_card
 * @property-read Transaction $transaction
 *
 * @property int $id
 * @property string $payment_processing_error_message
 * @property string $unique_token
 *
 * @method CreditCard getCreditCard()
 * @method Transaction getTransaction()
 * @method int getId()
 * @method string getPaymentProcessingErrorMessage()
 * @method string getUniqueToken()
 *
 * @method $this setId($value)
 * @method $this setPaymentProcessingErrorMessage($value)
 * @method $this setUniqueToken($value)
 */
class Payment extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Counts;

    /**
     * @var string
     */
    protected $resourceName = 'payment';

    /**
     * @var string
     */
    protected $endpoint = 'admin/checkouts/@token/payments';

    /**
     * @var array
     */
    protected $casts = [
        'credit_card' => 'property:' . CreditCard::class,
        'transaction' => 'property:' . Transaction::class,
    ];

    /**
     * @param array $params
     *
     * @return string
     */
    public function createSession($params = [])
    {
        $response = $this->client->performPostRequest('https://elb.deposit.shopifycs.com/sessions', $params);

        $data = $response->toArray();

        return !empty($data['id'])
            ? $data['id']
            : null;
    }
}