<?php

namespace Yorki\Shopify\Resources\Orders;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Properties\Orders\CalculatedRefund;
use Yorki\Shopify\Properties\Orders\OrderAdjustment;
use Yorki\Shopify\Properties\Orders\RefundLineItem;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\Depends;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $processed_at
 * @property-read Collection $order_adjustments
 * @property-read Collection $refund_line_items
 * @property-read Collection $transactions
 *
 * @property int $id
 * @property bool $restock
 * @property int $user_id
 * @property string $note
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getProcessedAt()
 * @method Collection getOrderAdjustments()
 * @method Collection getRefundLineItems()
 * @method Collection getTransactions()
 * @method int getId()
 * @method bool getRestock()
 * @method int getUserId()
 * @method string getNote()
 * 
 * @method $this setId($id)
 * @method $this setRestock($restock)
 * @method $this setUserId($userId)
 * @method $this setNote($note)
 */
class Refund extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'refund';

    /**
     * @var string
     */
    protected $endpoint = 'admin/orders/:order_id/refunds';

    /**
     * @var array
     */
    protected $depends = [
        'order_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'order_adjustments' => 'collection:property:' . OrderAdjustment::class,
        'refund_line_items' => 'collection:property:' . RefundLineItem::class,
        'restock' => 'bool',
        'transactions' => 'collection:resource:' . Transaction::class,
    ];

    /**
     * @param array $params
     *
     * @throws \Exception
     *
     * @return CalculatedRefund|null
     */
    public function calculate(array $params)
    {
        $response = $response = $this->client->performPostRequest(
            $this->getFilledSingleEndpoint(null, '/calculate.json'),
            $params
        );

        $data = $response->getArray();

        if ($response->getStatusCode() !== 200) {
            return null;
        }

        return new CalculatedRefund($data['refund']);
    }
}