<?php

namespace Yorki\Shopify\Resources\Products;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Criteria\Products\ProductCriteria;
use Yorki\Shopify\Properties\Products\ProductOption;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Collection $variants
 * @property-read Collection $options
 * @property-read Collection $images
 * @property-read ProductImage $image
 *
 * @property int $id
 * @property string $title
 * @property string $body_html
 * @property string $vendor
 * @property string $product_type
 * @property Carbon $created_at
 * @property string $handle
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property string $template_suffix
 * @property array $tags
 * @property string $published_scope
 * @property string $admin_graphql_api_id
 *
 * @method Collection getVariants()
 * @method Collection getOptions()
 * @method Collection getImages()
 * @method ProductImage getImage() 
 * @method int getId()
 * @method string getTitle()
 * @method string getBodyHtml()
 * @method string getVendor()
 * @method string getProductType()
 * @method Carbon getCreatedAt()
 * @method string getHandle()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method string getTemplateSuffix()
 * @method array getTags()
 * @method string getPublishedScope()
 * @method string getAdminGraphqlApiId()
 *
 * @method $this setId($id)
 * @method $this setTitle($title)
 * @method $this setBodyHtml($bodyHtml)
 * @method $this setVendor($vendor)
 * @method $this setProductType($productType)
 * @method $this setCreatedAt(Carbon $createdAt)
 * @method $this setHandle($handle)
 * @method $this setUpdatedAt(Carbon $updatedAt)
 * @method $this setPublishedAt(Carbon $publishedAt)
 * @method $this setTemplateSuffix($templateSuffix)
 * @method $this setTags(array $tags)
 * @method $this setPublishedScope($publishedScope)
 * @method $this setAdminGraphqlApiId($adminGraphqlApiId)
 */
class Product extends BaseResource
{
    use Counts,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'product';

    /**
     * @var array
     */
    protected $provides = [
        'product_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'variants' => 'collection:resource:' . ProductVariant::class,
        'options' => 'collection:property:' . ProductOption::class,
        'images' => 'collection:resource:' . ProductImage::class,
        'image' => 'resource:' . ProductImage::class,
    ];

    /**
     * @param string $value
     *
     * @return array
     */
    public function getTagsAttribute($value)
    {
        return $this->fromCommaSeparated($value);
    }

    /**
     * @param array $tags
     *
     * @return string
     */
    public function setTagsAttribute(array $tags)
    {
        return $this->toCommaSeparated($tags);
    }

    /**
     * @return ProductCriteria
     */
    public function criteria()
    {
        return new ProductCriteria($this->client);
    }
}