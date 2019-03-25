<?php

namespace Yorki\Shopify\Resources\Customers;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Customers\CustomerCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Metafield\Metafield;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Provides;
use Yorki\Shopify\Resources\Traits\Searches;
use Yorki\Shopify\Resources\Orders\Order;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Collection $addresses
 * @property-read Collection $default_addresses
 * @property-read Metafield $metafield
 *
 * @property int $id
 * @property bool $accepts_marketing
 * @property int $last_order_id
 * @property int $orders_count
 * @property bool $tax_exempt
 * @property float $total_spent
 * @property bool $verified_email
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Collection getAddresses()
 * @method Collection getDefaultAddresses()
 * @method Metafield getMetafield()
 * @method int getId()
 * @method bool getAcceptsMarketing()
 * @method int getLastOrderId()
 * @method int getOrdersCount()
 * @method bool getTaxExempt()
 * @method float getTotalSpent()
 * @method bool getVerifiedEmail()
 * 
 * @method $this setId($id)
 * @method $this setAcceptsMarketing($acceptsMarketing)
 * @method $this setLastOrderId($lastOrderId)
 * @method $this setOrdersCount($ordersCount)
 * @method $this setTaxExempt($taxExempt)
 * @method $this setTotalSpent($totalSpent)
 * @method $this setVerifiedEmail($verifiedEmail)
 */
class Customer extends BaseResource
{
    use Counts,
        Searches,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'customer';

    /**
     * @var array
     */
    protected $provides = [
        'customer_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'accepts_marketing' => 'bool',
        'addresses' => 'collection:' . CustomerAddress::class,
        'default_address' => 'collection:' . CustomerAddress::class,
        'orders_count' => 'int',
        'tax_exempt' => 'bool',
        'total_spent' => 'float',
        'verified_email' => 'bool',
        'metafield' => 'resource:' . Metafield::class,
    ];

    /**
     * @throws \Exception
     *
     * @return Collection
     */
    public function orders()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/orders.json')
        );

        return $this->getCollectionFromResponse(
            $response,
            'orders',
            Order::class
        );
    }

    /**
     * @throws \Exception
     *
     * @return string|null
     */
    public function accountActivationUrl()
    {
        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint(null, '/account_activation_url.json')
        );

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return $response->toArray()['account_activation_url'];
    }

    /**
     * @param array $data
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function sendInvite($data = [])
    {
        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint(null, '/send_invite.json'),
            [
                'customer_invite' => $data,
            ]
        );

        return $response->getStatusCode() === 201;
    }

    /**
     * @return CustomerCriteria
     */
    public function criteria()
    {
        return new CustomerCriteria($this->client);
    }
}