<?php

namespace Yorki\Shopify\Criteria\Shipping;

use Yorki\Shopify\Criteria\SimpleCriteria;
use Yorki\Shopify\Criteria\Traits\CreatedAt;
use Yorki\Shopify\Criteria\Traits\UpdatedAt;

class FulfillmentCriteria extends SimpleCriteria
{
    use CreatedAt,
        UpdatedAt;
}