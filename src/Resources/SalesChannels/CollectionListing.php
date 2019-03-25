<?php

namespace Yorkii\Shopify\Resources\SalesChannels;

use Yorkii\Shopify\Criteria\SalesChannels\CollectionListingCriteria;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\CreatesAndSaves;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $published_at
 * @property-read Carbon $updated_at
 *
 * @property int $collection_id
 * @property string $title
 * @property string $sort_order
 * @property string $body_html
 * @property string $handle
 * @property array $default_product_image
 * @property array $image
 * 
 * @method Carbon getPublishedAt()
 * @method Carbon getUpdatedAt() 
 * @method int getCollectionId()
 * @method string getTitle()
 * @method string getSortOrder()
 * @method string getBodyHtml()
 * @method string getHandle()
 * @method array getDefaultProductImage()
 * @method array getImage()
 *
 * @method $this setCollectionId($value)
 * @method $this setTitle($value)
 * @method $this setSortOrder($value)
 * @method $this setBodyHtml($value)
 * @method $this setHandle($value)
 * @method $this setDefaultProductImage(array $value)
 * @method $this setImage(array $value)
 */
class CollectionListing extends Base
{
    use GetsAll,
        GetsSingle,
        CreatesAndSaves;

    /**
     * @var string
     */
    protected $primaryKey = 'collection_id';

    /**
     * @var string
     */
    protected $resourceName = 'collection_listing';

    /**
     * @var array
     */
    protected $casts = [
        'default_product_image' => 'array',
        'image' => 'array',
    ];

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
     * @return CollectionListingCriteria
     */
    public function criteria()
    {
        return new CollectionListingCriteria($this->client);
    }
}