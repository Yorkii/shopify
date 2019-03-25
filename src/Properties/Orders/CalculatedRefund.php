<?php

namespace Yorkii\Shopify\Properties\Orders;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Properties\Base;

/**
 * @property-read CalculatedRefundShipping shipping
 * @property-read Collection $refund_line_items
 * @property-read Collection $transactions
 *
 * @method CalculatedRefundShipping getShipping()
 * @method Collection getRefundLineItems()
 * @method Collection getTransactions()
 */
class CalculatedRefund extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'shipping' => 'property:' . CalculatedRefundShipping::class,
        'refund_line_items' => 'collection:property:' . CalculatedRefundLineItem::class,
        'transactions' => 'collection:property:' . CalculatedRefundTransaction::class,
    ];
}