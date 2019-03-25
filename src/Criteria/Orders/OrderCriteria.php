<?php

namespace Yorki\Shopify\Criteria\Orders;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\ProcessedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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