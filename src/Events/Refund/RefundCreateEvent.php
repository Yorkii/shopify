<?php

namespace Yorkii\Shopify\Events\Refund;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $processed_at
 * @property int $id
 * @property int $order_id
 * @property int $user_id
 * @property bool $restock
 * @property string $note
 * @property array $refund_line_items
 * @property array $transactions
 * @property array $order_adjustments
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getProcessedAt()
 * @method int getId()
 * @method int getOrderId()
 * @method int getUserId()
 * @method bool getRestock()
 * @method string getNote()
 * @method array getRefundLineItems()
 * @method array getTransactions()
 * @method array getOrderAdjustments()
 */
class RefundCreateEvent extends Base
{
    const EVENT_TOPIC = 'refunds/create';

    /**
     * @var array
     */
    protected $casts = [
        'restock' => 'bool',
    ];
}