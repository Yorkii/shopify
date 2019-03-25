<?php

namespace Yorkii\Shopify\Criteria\Analytics;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

/**
 * @method $this whereIds($ids)
 */
class ReportCriteria extends SimpleCriteria
{
    use UpdatedAt;

    /**
     * @var array
     */
    protected $keys = [
        'since_id',
        'ids',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'ids' => 'comma_separated',
    ];
}