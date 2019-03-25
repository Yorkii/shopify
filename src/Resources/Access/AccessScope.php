<?php

namespace Yorki\Shopify\Resources\Access;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\GetsAll;

/**
 * @property string $handle
 *
 * @method string getHandle()
 *
 * @method $this setHandle($handle)
 */
class AccessScope extends Base
{
    use GetsAll;

    /**
     * @var string
     */
    protected $resourceName = 'access_scope';
}