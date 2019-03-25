<?php

namespace Yorkii\Shopify\Criteria\OnlineStore;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\PublishedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereHandle($handle)
 * @method $this whereTag($tag)
 * @method $this whereAuthor($author)
 */
class BlogArticleCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt,
        PublishedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'handle',
        'tag',
        'author',
    ];
}