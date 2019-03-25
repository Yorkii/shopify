<?php

namespace Yorki\Shopify\Criteria\OnlineStore;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\PublishedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereStatus($status)
 */
class CommentCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt,
        PublishedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'status',
    ];
}