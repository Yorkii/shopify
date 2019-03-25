<?php

namespace Yorki\Shopify\Resources\Orders;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Orders\DraftOrderCriteria;
use Yorki\Shopify\Properties\Orders\AppliedDiscount;
use Yorki\Shopify\Properties\Orders\DraftOrderShippingLine;
use Yorki\Shopify\Properties\Orders\LineItem;
use Yorki\Shopify\Properties\Orders\NameValueProperty;
use Yorki\Shopify\Properties\Orders\TaxLine;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Customers\Customer;
use Yorki\Shopify\Resources\Customers\CustomerAddress;
use Yorki\Shopify\Resources\Traits\Completes;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Customer $customer
 * @property-read CustomerAddress $shipping_address
 * @property-read CustomerAddress $billing_address
 * @property-read Collection $note_attributes
 * @property-read Collection $line_items
 * @property-read Collection $tax_lines
 * @property-read DraftOrderShippingLine $shipping_line
 * @property-read AppliedDiscount $applied_discount
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $completed_at
 * @property-read Carbon $invoice_sent_at
 *
 * @property array $tags
 * @property bool $taxes_included
 * @property float $total_tax
 * @property float $subtotal_price
 * @property float $total_price
 * @property int $id
 * @property int $order_id
 * @property string $note
 * @property string $name
 * @property string $email
 * @property string $currency
 * @property string $invoice_url
 * @property string $status
 * 
 * @method Customer getCustomer()
 * @method CustomerAddress getShippingAddress()
 * @method CustomerAddress getBillingAddress()
 * @method Collection getNoteAttributes()
 * @method Collection getLineItems()
 * @method Collection getTaxLines()
 * @method DraftOrderShippingLine getShippingLine()
 * @method AppliedDiscount getAppliedDiscount()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getCompletedAt()
 * @method Carbon getInvoiceSentAt()
 * @method array getTags()
 * @method bool getTaxesIncluded()
 * @method float getTotalTax()
 * @method float getSubtotalPrice()
 * @method float getTotalPrice()
 * @method int getId()
 * @method int getOrderId()
 * @method string getNote()
 * @method string getName()
 * @method string getEmail()
 * @method string getCurrency()
 * @method string getInvoiceUrl()
 * @method string getStatus()
 * 
 *
 * @method $this setTags(array $tags)
 * @method $this setTaxesIncluded($taxesIncluded)
 * @method $this setTotalTax($totalTax)
 * @method $this setSubtotalPrice($subtotalPrice)
 * @method $this setTotalPrice($totalPrice)
 * @method $this setId($id)
 * @method $this setOrderId($orderId)
 * @method $this setNote($note)
 * @method $this setName($name)
 * @method $this setEmail($email)
 * @method $this setCurrency($currency)
 * @method $this setInvoiceUrl($invoiceUrl)
 * @method $this setStatus($status)
 */
class DraftOrder extends BaseResource
{
    use Counts,
        Completes;

    /**
     * @var array
     */
    protected $casts = [
        'customer' => 'resource:' . Customer::class,
        'shipping_address' => 'resource:' . CustomerAddress::class,
        'billing_address' => 'resource:' . CustomerAddress::class,
        'note_attributes' => 'collection:property:' . NameValueProperty::class,
        'line_items' => 'collection:resource:' . LineItem::class,
        'shipping_line' => 'property:' . DraftOrderShippingLine::class,
        'tax_lines' => 'collection:property:' . TaxLine::class,
        'applied_discount' => 'property:' . AppliedDiscount::class,
        'taxes_included' => 'bool',
        'total_tax' => 'float',
        'subtotal_price' => 'float',
        'total_price' => 'float',
    ];

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'admin/draft_orders';
    }

    /**
     * @return string
     */
    public function getSingular()
    {
        return 'draft_orders';
    }

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
     * @param array $params
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function sendInvoice(array $params = [])
    {
        $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint(null, '/send_invoice.json'),
            [
                'draft_order_invoice' => $params,
            ]
        );

        return $response->getStatusCode() === 200;
    }

    /**
     * @return DraftOrderCriteria
     */
    public function criteria()
    {
        return new DraftOrderCriteria($this->client);
    }
}