<?php

namespace Yorkii\Shopify\Resources;

use Yorkii\Shopify\Resources\Traits\CreatesAndSaves;
use Yorkii\Shopify\Resources\Traits\Deletes;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;

abstract class BaseResource extends Base
{
    use GetsSingle,
        GetsAll,
        CreatesAndSaves,
        Deletes;
}