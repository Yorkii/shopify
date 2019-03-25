<?php

namespace Yorki\Shopify\Resources;

use Yorki\Shopify\Resources\Traits\CreatesAndSaves;
use Yorki\Shopify\Resources\Traits\Deletes;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;

abstract class BaseResource extends Base
{
    use GetsSingle,
        GetsAll,
        CreatesAndSaves,
        Deletes;
}