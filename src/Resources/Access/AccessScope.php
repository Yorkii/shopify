<?php

namespace Yorkii\Shopify\Resources\Access;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\GetsAll;

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