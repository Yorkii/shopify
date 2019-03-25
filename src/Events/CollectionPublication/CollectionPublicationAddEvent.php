<?php

namespace Yorki\Shopify\Events\CollectionPublication;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property int $collection_id
 * @property string $handle
 * @property string $title
 * @property string $body_html
 * @property string $sort_order
 * @property string $template_suffix
 * @property string $published_scope
 * 
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getCollectionId()
 * @method string getHandle()
 * @method string getTitle()
 * @method string getBodyHtml()
 * @method string getSortOrder()
 * @method string getTemplateSuffix()
 * @method string getPublishedScope()
 */
class CollectionPublicationAddEvent extends Base
{
    const EVENT_TOPIC = 'collection_listings/add';
}