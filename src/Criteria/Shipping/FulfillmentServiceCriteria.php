<?php

namespace Yorki\Shopify\Criteria\Shipping;

use Yorki\Shopify\Criteria\Base;

/**
 * @method $this whereScope($scope)
 */
class FulfillmentServiceCriteria extends Base
{
    /**
     * @var array
     */
    protected $keys = [
        'scope',
    ];
}