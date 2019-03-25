<?php

namespace Yorki\Shopify\Criteria\SalesChannels;

use Yorki\Shopify\Criteria\Base;

/**
 * @method $this whereProductIds($productIds)
 * @method $this whereCollectionId($collectionId)
 * @method $this whereUpdatedAtMin($updatedAtMin)
 * @method $this whereHandle($handle)
 */
class ProductListingCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'product_ids',
        'collection_id',
        'updated_at_min',
        'handle',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'product_ids' => 'comma_separated',
        'updated_at_min' => 'date',
    ];
}