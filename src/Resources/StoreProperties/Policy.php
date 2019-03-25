<?php

namespace Yorki\Shopify\Resources\StoreProperties;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property string $title
 * @property string $body
 * @property string $url
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method string getTitle()
 * @method string getBody()
 * @method string getUrl()
 *
 * @method $this setTitle($value)
 * @method $this setBody($value)
 * @method $this setUrl($value)
 */
class Policy extends Base
{
    use GetsAll;

    /**
     * @var string
     */
    protected $resourceName = 'policy';

    /**
     * @var string
     */
    protected $plural = 'policies';
}