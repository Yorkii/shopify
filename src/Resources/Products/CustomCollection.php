<?php

namespace Yorkii\Shopify\Resources\Products;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Criteria\Products\CustomCollectionCriteria;
use Yorkii\Shopify\Properties\Products\CustomCollectionImage;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Metafield\Metafield;
use Yorkii\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 * @property-read Collection $metafields
 * @property-read CustomCollectionImage $image
 *
 * @property int $id
 * @property int $position
 * @property bool $featured
 * @property bool $published
 * @property int $collection_id
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method Collection getMetafields()
 * @method CustomCollectionImage getImage()
 * @method bool getFeatured()
 * @method bool getPublished()
 * @method int getCollectionId()
 * @method int getPosition()
 *
 * @method $this setId()
 * @method $this setFeatured()
 * @method $this setPublished()
 * @method $this setCollectionId()
 * @method $this setPosition()
 */
class CustomCollection extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'custom_collection';

    /**
     * @var array
     */
    protected $casts = [
        'featured' => 'bool',
        'position' => 'int',
        'published' => 'bool',
        'metafields' => 'collection:resource:' . Metafield::class,
        'image' => 'resource:' . CustomCollectionImage::class,
    ];

    /**
     * @return CustomCollectionCriteria
     */
    public function criteria()
    {
        return new CustomCollectionCriteria($this->client);
    }
}