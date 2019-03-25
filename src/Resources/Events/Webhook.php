<?php

namespace Yorki\Shopify\Resources\Events;

use Yorki\Shopify\Criteria\Events\WebhookCriteria;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property array $fields
 * @property array $metafield_namespaces
 * @property string $address
 * @property string $format
 * @property string $topic
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method array getFields()
 * @method array getMetafieldNamespaces()
 * @method string getAddress()
 * @method string getFormat()
 * @method string getTopic()
 * 
 * @method $this setId($id)
 * @method $this setFields(array $fields)
 * @method $this setMetafieldNamespaces(array $metafieldNamespaces)
 * @method $this setAddress($address)
 * @method $this setFormat($format)
 * @method $this setTopic($topic)
 */
class Webhook extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'webhook';

    /**
     * @var array
     */
    protected $casts = [
        'metafield_namespaces' => 'array',
        'fields' => 'array',
    ];

    /**
     * @return WebhookCriteria
     */
    public function criteria()
    {
        return new WebhookCriteria($this->client);
    }
}