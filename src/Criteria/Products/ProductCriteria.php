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
 * @method $this whereVendor($vendor)
 * @method $this whereHandle($handle)
 * @method $this whereProductType($productType)
 */
class ProductCriteria extends Base
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
        'vendor',
        'handle',
        'product_type',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}