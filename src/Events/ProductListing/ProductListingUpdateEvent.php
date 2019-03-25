<?php

namespace Yorkii\Shopify\Events\ProductListing;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $published_at
 * @property int $product_id
 * @property string $title
 * @property string $body_html
 * @property string $vendor
 * @property string $product_type
 * @property string $handle
 * @property string $tags
 * @property bool $available
 * @property array $variants
 * @property array $options
 * @property array $images
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getPublishedAt()
 * @method int getProductId()
 * @method string getTitle()
 * @method string getBodyHtml()
 * @method string getVendor()
 * @method string getProductType()
 * @method string getHandle()
 * @method string getTags()
 * @method bool getAvailable()
 * @method array getVariants()
 * @method array getOptions()
 * @method array getImages()
 * @method array getImage()
 */
class ProductListingUpdateEvent extends Base
{
    const EVENT_TOPIC = 'product_listings/update';
}