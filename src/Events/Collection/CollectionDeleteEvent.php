<?php

namespace Yorkii\Shopify\Events\Collection;

use Yorkii\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property int $id
 * @property string $handle
 * @property string $title
 * @property string $body_html
 * @property string $sort_order
 * @property string $template_suffix
 * @property string $published_scope
 * 
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getId()
 * @method string getHandle()
 * @method string getTitle()
 * @method string getBodyHtml()
 * @method string getSortOrder()
 * @method string getTemplateSuffix()
 * @method string getPublishedScope()
 */
class CollectionDeleteEvent extends Base
{
    const EVENT_TOPIC = 'collections/delete';
}