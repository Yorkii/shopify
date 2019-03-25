<?php

namespace Yorkii\Shopify\Criteria\Orders;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\ProcessedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereAttributionAppId($attributionAppId)
 * @method $this whereStatus($status)
 * @method $this whereFinancialStatus($financialStatus)
 * @method $this whereFulfillmentStatus($fulfillmentStatus)
 */
class OrderCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt,
        ProcessedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'attribution_app_id',
        'status',
        'financial_status',
        'fulfillment_status',
    ];
}