<?php

namespace Yorkii\Shopify\Resources\Orders;

use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Depends;

/**
 * @property int $id
 * @property bool $cause_cancel
 * @property bool $display
 * @property int $order_id
 * @property float $score
 * @property string $message
 * @property string $recommendation
 * @property string $source
 * 
 * @method int getId()
 * @method bool getCauseCancel()
 * @method bool getDisplay()
 * @method int getOrderId()
 * @method float getScore()
 * @method string getMessage()
 * @method string getRecommendation()
 * @method string getSource()
 * 
 * @method $this setId($id)
 * @method $this setCauseCancel($causeCancel)
 * @method $this setDisplay($display)
 * @method $this setOrderId($orderId)
 * @method $this setScore($score)
 * @method $this setMessage($message)
 * @method $this setRecommendation($recommendation)
 * @method $this setSource($source)
 */
class OrderRisk extends BaseResource
{
    use Depends;

    /**
     * @var string
     */
    protected $resourceName = 'risk';

    /**
     * @var string
     */
    protected $endpoint = 'admin/orders/:order_id/risks';

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
        'cause_cancel' => 'bool',
        'display' => 'bool',
        'score' => 'float',
    ];
}