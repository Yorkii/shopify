<?php

namespace Yorkii\Shopify\Resources\SalesChannels;

use Yorkii\Shopify\Criteria\SalesChannels\ProductListingCriteria;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Products\ProductVariant;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\CreatesAndSaves;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $published_at
 *
 * @property int $product_id
 * @property string $title
 * @property string $product_type 
 * @property string $body_html
 * @property string $handle
 * @property string $vendor
 * @property array $options
 * @property array $images
 * @property array $tags
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getProductId()
 * @method string getTitle()
 * @method string getProductType()
 * @method string getBodyHtml()
 * @method string getHandle()
 * @method string getVendor()
 * @method array getOptions()
 * @method array getImages()
 * @method array getTags()
 *
 * @method $this setProductId($value)
 * @method $this setTitle($value)
 * @method $this setProductType($value)
 * @method $this setBodyHtml($value)
 * @method $this setHandle($value)
 * @method $this setVendor($value)
 * @method $this setOptions($value)
 * @method $this setImages($value)
 * @method $this setTags($value)
 */
class ProductListing extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'product_listing';

    /**
     * @var array
     */
    protected $casts = [
        'default_product_image' => 'array',
        'options' => 'array',
        'variants' => 'collection:resource:' . ProductVariant::class,
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
     * @throws \Exception
     *
     * @return array
     */
    public function productsIds()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/product_ids.json')
        );

        $data = $response->toArray();

        return !empty($data['product_ids'])
            ? $data['product_ids']
            : [];
    }

    /**
     * @return ProductListingCriteria
     */
    public function criteria()
    {
        return new ProductListingCriteria($this->client);
    }
}