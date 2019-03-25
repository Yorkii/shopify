<?php

namespace Yorki\Shopify\Criteria\Analytics;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

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