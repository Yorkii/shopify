<?php

namespace Yorkii\Shopify\Criteria\Products;

use Yorkii\Shopify\Criteria\Base;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\PublishedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

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