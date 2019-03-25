<?php

namespace Yorki\Shopify\Resources\SalesChannels;

use Yorki\Shopify\Properties\SalesChannels\ShippingRate;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Completes;
use Yorki\Shopify\Resources\Traits\CreatesAndSaves;
use Yorki\Shopify\Resources\Traits\GetsSingle;
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
class Checkout extends Base
{
    use GetsSingle,
        CreatesAndSaves,
        Completes;

    /**
     * @var string
     */
    protected $primaryKey = 'token';

    /**
     * @var string
     */
    protected $resourceName = 'checkout';

    /**
     * @throws \Exception
     *
     * @return \Yorki\Shopify\Collection
     */
    public function shippingRates()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/shipping_rates.json')
        );

        return $this->getCollectionFromResponse(
            $response,
            'shipping_rates',
            ShippingRate::class,
            false
        );
    }
}