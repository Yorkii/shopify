<?php

namespace Yorki\Shopify\Resources\Products;

use Yorki\Shopify\Criteria\Products\CollectCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property bool $featured
 * @property int $collection_id
 * @property int $position
 * @property string $sort_value
 * @property int $product_id
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method bool getFeatured()
 * @method int getCollectionId()
 * @method int getPosition()
 * @method string getSortValue()
 * @method int getProductId()
 *
 * @method $this setId()
 * @method $this setFeatured()
 * @method $this setCollectionId()
 * @method $this setPosition()
 * @method $this setSortValue()
 * @method $this setProductId()
 */
class Collect extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'collect';

    /**
     * @var array
     */
    protected $casts = [
        'featured' => 'bool',
        'position' => 'int',
    ];

    /**
     * @return CollectCriteria
     */
    public function criteria()
    {
        return new CollectCriteria($this->client);
    }
}