<?php

namespace Yorki\Shopify\Events\CustomerSavedSearch;

use Yorki\Shopify\Events\Base;
use \Carbon\Carbon;

/**
 * @property Carbon $updated_at
 * @property Carbon $published_at
 * @property int $id
 * @property string $name
 * @property string $query
 * 
 * @method Carbon getUpdatedAt()
 * @method Carbon getPublishedAt()
 * @method int getId()
 * @method string getName()
 * @method string getQuery()
 */
class CustomerSavedSearchDeleteEvent extends Base
{
    const EVENT_TOPIC = 'customer_groups/delete';
}