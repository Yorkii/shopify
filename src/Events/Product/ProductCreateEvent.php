<?php

namespace Yorki\Shopify\Events\Product;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $published_at
 * @property int $id
 * @property string $title
 * @property string $body_html
 * @property string $vendor
 * @property string $product_type
 * @property string $handle
 * @property string $template_suffix
 * @property string $tags
 * @property string $published_scope
 * @property array $variants
 * @property array $options
 * @property array $images
 * @property array $image
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getPublishedAt()
 * @method int getId()
 * @method string getTitle()
 * @method string getBodyHtml()
 * @method string getVendor()
 * @method string getProductType()
 * @method string getHandle()
 * @method string getTemplateSuffix()
 * @method string getTags()
 * @method string getPublishedScope()
 * @method array getVariants()
 * @method array getOptions()
 * @method array getImages()
 * @method array getImage()
 */
class ProductCreateEvent extends Base
{
    const EVENT_TOPIC = 'products/create';
}