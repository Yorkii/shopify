<?php

namespace Yorki\Shopify\Resources\Events;

use Yorki\Shopify\Criteria\Events\EventCriteria;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 *
 * @property int $id
 * @property int $subject_id
 * @property string $arguments
 * @property string $body
 * @property string $description
 * @property string $path
 * @property string $message
 * @property string $subject_type
 * @property string $verb
 * 
 * @method Carbon getCreatedAt()
 * @method int getId()
 * @method int getSubjectId()
 * @method string getArguments()
 * @method string getBody()
 * @method string getDescription()
 * @method string getPath()
 * @method string getMessage()
 * @method string getSubjectType()
 * @method string getVerb()
 * 
 * @method $this setId($id)
 * @method $this setSubjectId($subjectId)
 * @method $this setArguments($arguments)
 * @method $this setBody($body)
 * @method $this setDescription($description)
 * @method $this setPath($path)
 * @method $this setMessage($message)
 * @method $this setSubjectType($subjectType)
 * @method $this setVerb($verb)
 */
class Event extends Base
{
    use GetsAll,
        GetsSingle,
        Counts;

    /**
     * @var string
     */
    protected $resourceName = 'event';

    /**
     * @return EventCriteria
     */
    public function criteria()
    {
        return new EventCriteria($this->client);
    }
}