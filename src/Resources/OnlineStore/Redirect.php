<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Criteria\OnlineStore\RedirectCriteria;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Counts;

/**
 * @property int $id
 * @property string $path
 * @property string $target
 *
 * @method int getId()
 * @method int getPath()
 * @method string getTarget()
 * 
 * @method $this setId($value)
 * @method $this setPath($value)
 * @method $this setTarget($value)
 */
class Redirect extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'redirect';

    /**
     * @return RedirectCriteria
     */
    public function criteria()
    {
        return new RedirectCriteria($this->client);
    }
}