<?php

namespace Yorkii\Shopify\Events\CustomerSavedSearch;

use Yorkii\Shopify\Events\Base;
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
class CustomerSavedSearchUpdateEvent extends Base
{
    const EVENT_TOPIC = 'customer_groups/update';
}