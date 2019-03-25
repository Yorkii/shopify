<?php

namespace Yorki\Shopify\Resources\MarketingEvent;

use Yorki\Shopify\Properties\MarketingEvent\UtmParameters;
use Yorki\Shopify\Resources\BaseResource;
use Yorki\Shopify\Resources\Traits\Counts;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $started_at
 * @property-read Carbon $ended_at
 * @property-read Carbon $scheduled_to_end_at
 * @property-read UtmParameters $marketing_event
 *
 * @property string $remote_id
 * @property string $event_type
 * @property string $marketing_channel
 * @property bool $paid
 * @property string $referring_domain
 * @property float $budget
 * @property string $currency
 * @property string $budget_type
 * @property string $description
 * @property string $manage_url
 * @property string $preview_url
 * @property array $marketed_resources
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getStartedAt()
 * @method Carbon getEndedAt()
 * @method Carbon getScheduledToEndAt()
 * @method UtmParameters getMarketingEvent()
 * @method string getRemoteId()
 * @method string getEventType()
 * @method string getMarketingChannel()
 * @method bool getPaid()
 * @method string getReferringDomain()
 * @method float getBudget()
 * @method string getCurrency()
 * @method string getBudgetType()
 * @method string getDescription()
 * @method string getManageUrl()
 * @method string getPreviewUrl()
 * @method array getMarketedResources()
 * 
 * @method $this setRemoteId($value)
 * @method $this setEventType($value)
 * @method $this setMarketingChannel($value)
 * @method $this setPaid($value)
 * @method $this setReferringDomain($value)
 * @method $this setBudget($value)
 * @method $this setCurrency($value)
 * @method $this setBudgetType($value)
 * @method $this setDescription($value)
 * @method $this setManageUrl($value)
 * @method $this setPreviewUrl($value)
 * @method $this setMarketedResources(array $value)
 */
class MarketingEvent extends BaseResource
{
    use Counts;

    /**
     * @var string
     */
    protected $resourceName = 'marketing_event';

    /**
     * @var array
     */
    protected $casts = [
        'paid' => 'bool',
        'budget' => 'float',
        'marketing_event' => 'property:' . UtmParameters::class,
        'marketed_resources' => 'array',
    ];

    /**
     * @param array $params
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool
     */
    public function engagements($params = [], $id = null)
    {
        return $this->singlePostWithSuccess($id, 'engagements', $params);
    }
}