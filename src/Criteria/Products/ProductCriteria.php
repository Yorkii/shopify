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