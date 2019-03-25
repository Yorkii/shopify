<?php

namespace Yorki\Shopify\Resources\SalesChannels;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $feedback_generated_at
 *
 * @property int $resource_id
 * @property string $resource_type
 * @property string $state
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getFeedbackGeneratedAt()
 * @method int getResourceId()
 * @method string getResourceType()
 * @method string getState()
 *
 * @method $this setResourceId($value)
 * @method $this setResourceType($value)
 * @method $this setState($value)
 */
class ResourceFeedback extends Base
{
    use GetsAll,
        Creates;

    /**
     * @var string
     */
    protected $resourceName = 'resource_feedback';

    /**
     * @var array
     */
    protected $casts = [
        'messages' => 'array',
    ];
}