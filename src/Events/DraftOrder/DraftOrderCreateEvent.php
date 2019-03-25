<?php

namespace Yorkii\Shopify\Events\DraftOrder;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Events\Base;
use Yorkii\Shopify\Events\Schema\Address;
use Yorkii\Shopify\Events\Schema\Customer;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property Carbon $completed_at
 * @property Carbon $invoice_sent_at
 * @property Collection $line_items
 * @property Address $shipping_address
 * @property Address $billing_address
 * @property Customer $customer
 * @property int $id
 * @property string $note
 * @property string $email
 * @property bool $taxes_included
 * @property string $currency
 * @property float $subtotal_price
 * @property float $total_tax
 * @property float $total_price
 * @property bool $tax_exempt
 * @property string $name
 * @property string $status
 * @property string $invoice_url
 * @property array $applied_discount
 * @property int $order_id
 * @property array $shipping_line
 * @property array $tax_lines
 * @property string $tags
 * @property array $note_attributes
 * 
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Carbon getCompletedAt()
 * @method Carbon getInvoiceSentAt()
 * @method Collection getLineItems()
 * @method Address getShippingAddress()
 * @method Address getBillingAddress()
 * @method Customer getCustomer()
 * @method int getId()
 * @method string getNote()
 * @method string getEmail()
 * @method bool getTaxesIncluded()
 * @method string getCurrency()
 * @method float getSubtotalPrice()
 * @method float getTotalTax()
 * @method float getTotalPrice()
 * @method bool getTaxExempt()
 * @method string getName()
 * @method string getStatus()
 * @method string getInvoiceUrl()
 * @method array getAppliedDiscount()
 * @method int getOrderId()
 * @method array getShippingLine()
 * @method array getTaxLines()
 * @method string getTags()
 * @method array getNoteAttributes()
 */
class DraftOrderCreateEvent extends Base
{
    const EVENT_TOPIC = 'draft_orders/create';
}