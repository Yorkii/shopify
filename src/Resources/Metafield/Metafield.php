<?php

namespace Yorki\Shopify\Resources\Metafield;

use Yorki\Shopify\Criteria\Inventory\MetafieldCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property int $owner_id
 * @property string $owner_resource
 * @property string $description
 * @property string $key
 * @property string $value
 * @property string $value_type
 * @property string $namespace
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method int getOwnerId()
 * @method string getOwnerResource()
 * @method string getDescription()
 * @method string getKey()
 * @method string getValue()
 * @method string getValueType()
 * @method string getNamespace()
 *
 * @method $this setId($value)
 * @method $this setOwnerId($value)
 * @method $this setOwnerResource($value)
 * @method $this setDescription($value)
 * @method $this setKey($key)
 * @method $this setValue($value)
 * @method $this setValueType($valueType)
 * @method $this setNamespace($namespace)
 */
class Metafield extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'metfield';

    /**
     * @return MetafieldCriteria
     */
    public function criteria()
    {
        return new MetafieldCriteria($this->client);
    }
}