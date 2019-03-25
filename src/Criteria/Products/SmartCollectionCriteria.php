<?php

namespace Yorki\Shopify\Criteria\Products;

use Yorki\Shopify\Criteria\Base;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\PublishedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereIds(array $ids)
 * @method $this whereSinceId($sinceId)
 * @method $this whereTitle($title)
 * @method $this whereProductId($productId)
 * @method $this whereHandle($handle)
 */
class SmartCollectionCriteria extends Base
{
    use CreatedAt,
        UpdatedAt,
        PublishedAt;

    /**
     * @var array
     */
    protected $keys = [
        'ids',
        'since_id',
        'title',
        'product_id',
        'handle',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}