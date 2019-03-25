<?php

namespace Yorkii\Shopify\Events\Order;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Events\Base;
use Yorkii\Shopify\Events\Schema\Address;
use Yorkii\Shopify\Events\Schema\Customer;
use Yorkii\Shopify\Events\Schema\LineItem;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $closed_at
 * @property Carbon $cancelled_at
 * @property Carbon $processed_at
 * @property int $id
 * @property int $number
 * @property string $email
 * @property string $note
 * @property string $token
 * @property string $gateway
 * @property bool $test
 * @property float $total_price
 * @property float $subtotal_price
 * @property float $total_weight
 * @property float $total_tax
 * @property bool $taxes_included
 * @property string $currency
 * @property string $financial_status
 * @property bool $confirmed
 * @property float $total_discounts
 * @property float $total_line_items_price
 * @property string $cart_token
 * @property bool $buyer_accepts_marketing
 * @property string $name
 * @property string $referring_site
 * @property string $landing_site
 * @property string $cancel_reason
 * @property float $total_price_usd
 * @property string $checkout_token
 * @property string $reference
 * @property int $user_id
 * @property int $location_id
 * @property string $source_identifier
 * @property string $source_url
 * @property string $device_id
 * @property string $phone
 * @property string $customer_locale
 * @property string $app_id
 * @property string $browser_ip
 * @property string $landing_site_ref
 * @property int $order_number
 * @property array $discount_applications
 * @property array $discount_codes
 * @property array $note_attributes
 * @property array $payment_gateway_names
 * @property string $processing_method
 * @property string $checkout_id
 * @property string $source_name
 * @property string $fulfillment_status
 * @property array $tax_lines
 * @property string $tags
 * @property string $contact_email
 * @property string $order_status_url
 * @property Collection $line_items
 * @property array $shipping_lines
 * @property Address $billing_address
 * @property Address $shipping_address
 * @property array $fulfillments
 * @property array $refunds
 * @property Customer $customer
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getName()
 * @method string getAddress1()
 * @method string getAddress2()
 * @method string getCity()
 * @method string getZip()
 * @method string getProvince()
 * @method string getCountry()
 * @method string getPhone()
 * @method string getCountryCode()
 * @method string getCountryName()
 * @method string getProvinceCode()
 * @method bool getLegacy()
 */
class OrderUpdateEvent extends Base
{
    const EVENT_TOPIC = 'orders/update';

    /**
     * @var array
     */
    protected $casts = [
        'device_id' => 'string',
        'app_id' => 'string',
        'checkout_id' => 'string',
        'number' => 'int',
        'total_price' => 'float',
        'subtotal_price' => 'float',
        'total_weight' => 'float',
        'total_tax' => 'float',
        'taxes_included' => 'bool',
        'confirmed' => 'bool',
        'total_discounts' => 'float',
        'total_line_items_price' => 'float',
        'buyer_accepts_marketing' => 'bool',
        'order_number' => 'int',
        'line_items' => 'collection:schema:' . LineItem::class,
        'billing_address' => 'schema:' . Address::class,
        'shipping_address' => 'schema:' . Address::class,
        'customer' => 'schema:' . Customer::class,
    ];
}