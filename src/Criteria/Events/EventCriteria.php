<?php

namespace Yorkii\Shopify\Criteria\Events;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;

/**
 * @method $this whereFilter($filter)
 * @method $this whereVerb($verb)
 */
class EventCriteria extends SimpleCriteria
{
    use CreatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'filter',
        'verb',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'filter' => 'comma_separated',
    ];
}