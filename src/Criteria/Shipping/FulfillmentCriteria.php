<?php

namespace Yorkii\Shopify\Criteria\Shipping;

use Yorkii\Shopify\Criteria\SimpleCriteria;
use Yorkii\Shopify\Criteria\Traits\CreatedAt;
use Yorkii\Shopify\Criteria\Traits\UpdatedAt;

class FulfillmentCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;
}