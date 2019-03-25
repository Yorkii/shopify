<?php

namespace Yorkii\Shopify\Criteria\Events;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereAddress($address)
 * @method $this whereTopic($topic)
 */
class WebhookCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'address',
        'topic',
    ];
}