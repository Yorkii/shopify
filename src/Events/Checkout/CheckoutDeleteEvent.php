<?php

namespace Yorki\Shopify\Events\Cart;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Events\Base;
use Yorki\Shopify\Events\Schema\LineItem;
use Yorki\Shopify\Events\Schema\Address;
use Yorki\Shopify\Events\Schema\Customer;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $completed_at
 * @property Carbon $closed_at
 * @property Address $billing_address
 * @property Address $shipping_address
 * @property Customer $customer
 * @property int $id
 * @property string $token
 * @property string $cart_token
 * @property string $email
 * @property string $gateway
 * @property string $landing_site
 * @property string $note
 * @property array $note_attributes
 * @property string $referring_site
 * @property array $shipping_lines
 * @property float $subtotal_price
 * @property bool $taxes_included
 * @property float $total_discounts
 * @property float $total_line_items_price
 * @property float $total_price
 * @property float $total_tax
 * @property float $total_weight
 * @property string $currency
 * @property int $user_id
 * @property int $location_id
 * @property string $source_identifier
 * @property string $source_url
 * @property string $device_id
 * @property string $phone
 * @property string $customer_locale
 * @property bool $buyer_accepts_marketing
 * @property Collection $line_items
 * @property string $name
 * @property string $source
 * @property array $discount_codes
 * @property string $abandoned_checkout_url
 * @property array $tax_lines
 * @property string $source_name
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getCompletedAt()
 * @method Carbon getClosedAt()
 * @method Address getBillingAddress()
 * @method Address getShippingAddress()
 * @method Customer getCustomer()
 * @method int getId()
 * @method string getToken()
 * @method string getCartToken()
 * @method string getEmail()
 * @method string getGateway()
 * @method string getLandingSite()
 * @method string getNote()
 * @method array getNoteAttributes()
 * @method string getReferringSite()
 * @method array getShippingLines()
 * @method float getSubtotalPrice()
 * @method bool getTaxesIncluded()
 * @method float getTotalDiscounts()
 * @method float getTotalLineItemsPrice()
 * @method float getTotalPrice()
 * @method float getTotalTax()
 * @method float getTotalWeight()
 * @method string getCurrency()
 * @method int getUserId()
 * @method int getLocationId()
 * @method string getSourceIdentifier()
 * @method string getSourceUrl()
 * @method string getDeviceId()
 * @method string getPhone()
 * @method string getCustomerLocale()
 * @method bool getBuyerAcceptsMarketing()
 * @method Collection getLineItems()
 * @method string getName()
 * @method string getSource()
 * @method array getDiscountCodes()
 * @method string getAbandonedCheckoutUrl()
 * @method array getTaxLines()
 * @method string getSourceName()
 */
class CheckoutDeleteEvent extends Base
{
    const EVENT_TOPIC = 'checkouts/delete';

    /**
     * @var array
     */
    protected $casts = [
        'taxes_included' => 'bool',
        'subtotal_price' => 'float',
        'total_discounts' => 'float',
        'total_line_items_price' => 'float',
        'total_price' => 'float',
        'total_tax' => 'float',
        'total_weight' => 'float',
        'buyer_accepts_marketing' => 'bool',
        'line_items' => 'collection:schema:' . LineItem::class,
        'billing_address' => 'schema:' . Address::class,
        'shipping_address' => 'schema:' . Address::class,
        'customer' => 'schema:' . Customer::class,
    ];
}