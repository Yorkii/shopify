<?php

namespace Yorkii\Shopify\Resources\Orders;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Criteria\Orders\OrderCriteria;
use Yorkii\Shopify\Properties\Orders\ClientDetails;
use Yorkii\Shopify\Properties\Orders\DiscountApplication;
use Yorkii\Shopify\Properties\Orders\DiscountCode;
use Yorkii\Shopify\Properties\Orders\LineItem;
use Yorkii\Shopify\Properties\Orders\NameValueProperty;
use Yorkii\Shopify\Properties\Orders\PaymentDetails;
use Yorkii\Shopify\Properties\Orders\ShippingLine;
use Yorkii\Shopify\Properties\Orders\TaxLine;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Customers\Customer;
use Yorkii\Shopify\Resources\Customers\CustomerAddress;
use Yorkii\Shopify\Resources\Shipping\Fulfillment;
use Yorkii\Shopify\Resources\Traits\Cancels;
use Yorkii\Shopify\Resources\Traits\Closes;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\Opens;
use Yorkii\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $closed_at
 * @property-read Carbon $cancelled_at
 * @property-read Carbon $processed_at
 * @property-read CustomerAddress $billing_address
 * @property-read ClientDetails $client_details
 * @property-read Customer $customer
 * @property-read Collection $discount_applications
 * @property-read Collection $discount_codes
 * @property-read Collection $line_items
 * @property-read Collection $note_attributes
 * @property-read PaymentDetails $payment_details
 * @property-read CustomerAddress $shipping_address
 * @property-read Collection $shipping_lines
 * @property-read Collection $tax_lines
 * @property-read Collection $fulfillments
 * @property-read Collection $refunds
 *
 * @property int $id
 * @property bool $buyer_accepts_marketing
 * @property int $location_id
 * @property array $payment_gateway_names
 * @property array $tags
 * @property int $number
 * @property int $order_number
 * @property float $subtotal_price
 * @property bool $taxes_included
 * @property float $total_discounts
 * @property float $total_line_items_price
 * @property float $total_price
 * @property float $total_tax
 * @property float $total_tip_received
 * @property int $total_weight
 * @property int $user_id
 * @property string $browser_ip
 * @property string $cancel_reason
 * @property string $cart_token
 * @property string $currency
 * @property string $customer_locale
 * @property string $email
 * @property string $financial_status
 * @property string $fulfillment_status
 * @property string $gateway
 * @property string $landing_site
 * @property string $name
 * @property string $note
 * @property string $phone
 * @property string $processing_method
 * @property string $referring_site
 * @property string $source_name
 * @property string $token
 * @property string $order_status_url
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getClosedAt()
 * @method Carbon getCancelledAt()
 * @method Carbon getProcessedAt()
 * @method CustomerAddress getBillingAddress()
 * @method ClientDetails getClientDetails()
 * @method Customer getCustomer()
 * @method Collection getDiscountApplications()
 * @method Collection getDiscountCodes()
 * @method Collection getLineItems()
 * @method Collection getNoteAttributes()
 * @method PaymentDetails getPaymentDetails()
 * @method CustomerAddress getShippingAddress()
 * @method Collection getShippingLines()
 * @method Collection getTaxLines()
 * @method Collection getFulfillments()
 * @method Collection getRefunds()
 * @method int getId()
 * @method bool getBuyerAcceptsMarketing()
 * @method int getLocationId()
 * @method array getPaymentGatewayNames()
 * @method array getTags()
 * @method int getNumber()
 * @method int getOrderNumber()
 * @method float getSubtotalPrice()
 * @method bool getTaxesIncluded()
 * @method float getTotalDiscounts()
 * @method float getTotalLineItemsPrice()
 * @method float getTotalPrice()
 * @method float getTotalTax()
 * @method float getTotalTipReceived()
 * @method int getTotalWeight()
 * @method int getUserId()
 * @method string getBrowserIp()
 * @method string getCancelReason()
 * @method string getCartToken()
 * @method string getCurrency()
 * @method string getCustomerLocale()
 * @method string getEmail()
 * @method string getFinancialStatus()
 * @method string getFulfillmentStatus()
 * @method string getGateway()
 * @method string getLandingSite()
 * @method string getName()
 * @method string getNote()
 * @method string getPhone()
 * @method string getProcessingMethod()
 * @method string getReferringSite()
 * @method string getSourceName()
 * @method string getToken()
 * @method string getOrderStatusUrl()
 *
 * @method $this setId($value)
 * @method $this setBuyerAcceptsMarketing($value)
 * @method $this setLocationId($value)
 * @method $this setPaymentGatewayNames(array $value)
 * @method $this setTags(array $value)
 * @method $this setNumber($value)
 * @method $this setOrderNumber($value)
 * @method $this setSubtotalPrice($value)
 * @method $this setTaxesIncluded($value)
 * @method $this setTotalDiscounts($value)
 * @method $this setTotalLineItemsPrice($value)
 * @method $this setTotalPrice($value)
 * @method $this setTotalTax($value)
 * @method $this setTotalTipReceived($value)
 * @method $this setTotalWeight($value)
 * @method $this setUserId($value)
 * @method $this setBrowserIp($value)
 * @method $this setCancelReason($value)
 * @method $this setCartToken($value)
 * @method $this setCurrency($value)
 * @method $this setCustomerLocale($value)
 * @method $this setEmail($value)
 * @method $this setFinancialStatus($value)
 * @method $this setFulfillmentStatus($value)
 * @method $this setGateway($value)
 * @method $this setLandingSite($value)
 * @method $this setName($value)
 * @method $this setNote($value)
 * @method $this setPhone($value)
 * @method $this setProcessingMethod($value)
 * @method $this setReferringSite($value)
 * @method $this setSourceName($value)
 * @method $this setToken($value)
 * @method $this setOrderStatusUrl()
 */
class Order extends BaseResource
{
    use Counts,
        Cancels,
        Closes,
        Opens,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'order';

    /**
     * @var array
     */
    protected $provides = [
        'order_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'billing_address' => 'resource:' . CustomerAddress::class,
        'buyer_accepts_marketing' => false,
        'client_details' => 'property:' . ClientDetails::class,
        'customer' => 'resource:' . Customer::class,
        'discount_applications' => 'collection:property:' . DiscountApplication::class,
        'discount_codes' => 'collection:property:' . DiscountCode::class,
        'line_items' => 'collection:property:' . LineItem::class,
        'note_attributes' => 'collection:property:' . NameValueProperty::class,
        'number' => 'int',
        'order_number' => 'int',
        'payment_details ' => 'property:' . PaymentDetails::class,
        'payment_gateway_names' => 'array',
        'shipping_address' => 'resource:' . CustomerAddress::class,
        'shipping_lines' => 'collection:property:' . ShippingLine::class,
        'subtotal_price' => 'float',
        'tax_lines' => 'collection:property:' . TaxLine::class,
        'taxes_included' => 'bool',
        'total_discounts' => 'float',
        'total_line_items_price' => 'float',
        'total_price' => 'float',
        'total_tax' => 'float',
        'total_tip_received' => 'float',
        'total_weight' => 'int',
        'fulfillments' => 'collection:resource:' . Fulfillment::class,
        'refunds' => 'collection:resource:' . Refund::class,
    ];

    /**
     * @param string $value
     *
     * @return array
     */
    public function getTagsAttribute($value)
    {
        return $this->fromCommaSeparated($value);
    }

    /**
     * @param array $tags
     *
     * @return string
     */
    public function setTagsAttribute(array $tags)
    {
        return $this->toCommaSeparated($tags);
    }

    /**
     * @return OrderCriteria
     */
    public function criteria()
    {
        return new OrderCriteria($this->client);
    }
}