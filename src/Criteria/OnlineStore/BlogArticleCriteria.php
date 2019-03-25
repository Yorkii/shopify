<?php

namespace Yorki\Shopify\Criteria\OnlineStore;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\PublishedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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