<?php

namespace Yorkii\Shopify\Criteria\Shipping;

use Yorkii\Shopify\Criteria\Base;

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