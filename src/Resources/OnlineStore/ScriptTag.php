<?php

namespace Yorkii\Shopify\Resources\OnlineStore;

use Yorkii\Shopify\Criteria\OnlineStore\ScriptTagCriteria;
use Yorkii\Shopify\Resources\BaseResource;
use Yorkii\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property int $id
 * @property string $src
 * @property string $event
 * @property string $display_scope
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getSrc()
 * @method string getEvent()
 * @method string getDisplayScope()
 * 
 * @method $this setId($value)
 * @method $this setSrc($value)
 * @method $this setEvent($value)
 * @method $this setDisplayScope($value)
 */
class ScriptTag extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'script_tag';

    /**
     * @return ScriptTagCriteria
     */
    public function criteria()
    {
        return new ScriptTagCriteria($this->client);
    }
}