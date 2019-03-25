<?php

namespace Yorki\Shopify\Resources\Orders;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Orders\AbandonedCheckoutsCriteria;
use Yorki\Shopify\Properties\Orders\AbandonedCheckoutShippingLine;
use Yorki\Shopify\Properties\Orders\DiscountCode;
use Yorki\Shopify\Properties\Orders\LineItem;
use Yorki\Shopify\Properties\Orders\NameValueProperty;
use Yorki\Shopify\Properties\Orders\TaxLine;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Customers\Customer;
use Yorki\Shopify\Resources\Customers\CustomerAddress;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $completed_at
 * @property-read Carbon $closed_at
 * @property-read Collection $note_attributes
 * @property-read Collection $shipping_lines
 * @property-read Collection $line_items
 * @property-read Collection $discount_codes
 * @property-read Collection $tax_lines
 * @property-read CustomerAddress $billing_address
 * @property-read CustomerAddress $shipping_address
 * @property-read Customer $customer
 *
 * @property int $id
 * @property bool $buyer_accepts_marketing
 * @property float $subtotal_price
 * @property float $total_discounts
 * @property bool $taxes_included
 * @property float $total_line_items_price
 * @property float $total_price
 * @property float $total_tax
 * @property int $total_weight
 * @property int $user_id
 * @property int $location_id
 * @property int $device_id
 * @property string $token
 * @property string $cart_token
 * @property string $email
 * @property string $gateway
 * @property string $landing_site
 * @property string $note
 * @property string $referring_site
 * @property string $currency
 * @property string $source_identifier
 * @property string $source_url
 * @property string $phone
 * @property string $customer_locale
 * @property string $name
 * @property string $source
 * @property string $source_name
 * @property string $abandoned_checkout_url
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getCompletedAt()
 * @method Carbon getClosedAt()
 * @method Collection getNoteAttributes()
 * @method Collection getShippingLines()
 * @method Collection getLineItems()
 * @method Collection getDiscountCodes()
 * @method Collection getTaxLines()
 * @method CustomerAddress getBillingAddress()
 * @method CustomerAddress getShippingAddress()
 * @method Customer getCustomer()
 * @method int getId()
 * @method bool getBuyerAcceptsMarketing()
 * @method float getSubtotalPrice()
 * @method float getTotalDiscounts()
 * @method bool getTaxesIncluded()
 * @method float getTotalLineItemsPrice()
 * @method float getTotalPrice()
 * @method float getTotalTax()
 * @method int getTotalWeight()
 * @method int getUserId()
 * @method int getLocationId()
 * @method int getDeviceId()
 * @method string getToken()
 * @method string getCartToken()
 * @method string getEmail()
 * @method string getGateway()
 * @method string getLandingSite()
 * @method string getNote()
 * @method string getReferringSite()
 * @method string getCurrency()
 * @method string getSourceIdentifier()
 * @method string getSourceUrl()
 * @method string getPhone()
 * @method string getCustomerLocale()
 * @method string getName()
 * @method string getSource()
 * @method string getSourceName()
 * @method string getAbandonedCheckoutUrl()
 * 
 * @method $this setId($value)
 * @method $this setBuyerAcceptsMarketing($value)
 * @method $this setSubtotalPrice($value)
 * @method $this setTotalDiscounts($value)
 * @method $this setTaxesIncluded($value)
 * @method $this setTotalLineItemsPrice($value)
 * @method $this setTotalPrice($value)
 * @method $this setTotalTax($value)
 * @method $this setTotalWeight($value)
 * @method $this setUserId($value)
 * @method $this setLocationId($value)
 * @method $this setDeviceId($value)
 * @method $this setToken($value)
 * @method $this setCartToken($value)
 * @method $this setEmail($value)
 * @method $this setGateway($value)
 * @method $this setLandingSite($value)
 * @method $this setNote($value)
 * @method $this setReferringSite($value)
 * @method $this setCurrency($value)
 * @method $this setSourceIdentifier($value)
 * @method $this setSourceUrl($value)
 * @method $this setPhone($value)
 * @method $this setCustomerLocale($value)
 * @method $this setName($value)
 * @method $this setSource($value)
 * @method $this setSourceName($value)
 * @method $this setAbandonedCheckoutUrl($value)
 */
class AbandonedCheckouts extends Base
{
    use GetsAll,
        Counts;

    /**
     * @var string
     */
    protected $resourceName = 'checkout';

    /**
     * @var array
     */
    protected $casts = [
        'buyer_accepts_marketing' => 'bool',
        'note_attributes' => 'collection:property:' . NameValueProperty::class,
        'shipping_lines' => 'collection:property:' . AbandonedCheckoutShippingLine::class,
        'subtotal_price' => 'float',
        'taxes_included' => 'bool',
        'total_discounts' => 'float',
        'total_line_items_price' => 'float',
        'total_price' => 'float',
        'total_tax' => 'float',
        'total_weight' => 'int',
        'line_items' => 'collection:property:' . LineItem::class,
        'discount_codes' => 'collection:property:' . DiscountCode::class,
        'tax_lines' => 'collection:property:' . TaxLine::class,
        'billing_address' => 'resource:' . CustomerAddress::class,
        'shipping_address' => 'resource:' . CustomerAddress::class,
        'customer' => 'resource:' . Customer::class,
    ];

    /**
     * @return AbandonedCheckoutsCriteria
     */
    public function criteria()
    {
        return new AbandonedCheckoutsCriteria($this->client);
    }
}