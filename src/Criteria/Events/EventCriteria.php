<?php

namespace Yorki\Shopify\Criteria\Events;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;

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