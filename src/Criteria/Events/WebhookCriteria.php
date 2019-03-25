<?php

namespace Yorki\Shopify\Criteria\Events;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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