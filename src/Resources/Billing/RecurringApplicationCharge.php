<?php

namespace Yorki\Shopify\Resources\Billing;

use Yorki\Shopify\Criteria\Billing\RecurringApplicationChargeCriteria;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Activates;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\Customizes;
use Yorki\Shopify\Resources\Traits\Deletes;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use Yorki\Shopify\Resources\Traits\Provides;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $activated_on
 * @property-read Carbon $billing_on
 * @property-read Carbon $cancelled_on
 * @property-read Carbon $trail_ends_on
 *
 * @property int $id
 * @property float $capped_amount
 * @property float $price
 * @property int $trial_days
 * @property bool|null $test
 * @property string $confirmation_url
 * @property string $name
 * @property string $return_url
 * @property string $status
 * @property string $terms
 *
 * @method int getId()
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getActivatedOn()
 * @method Carbon getBillingOn()
 * @method Carbon getCancelledOn()
 * @method Carbon getTrailEndsOn()
 * @method float getCappedAmount()
 * @method float getPrice()
 * @method int getTrialDays()
 * @method bool|null getTest()
 * @method string getConfirmationUrl()
 * @method string getName()
 * @method string getReturnUrl()
 * @method string getStatus()
 * @method string getTerms()
 *
 * @method $this setId($id)
 * @method $this setCappedAmount($cappedAmount)
 * @method $this setPrice($price)
 * @method $this setTrialDays($trialDays)
 * @method $this setTest($test)
 * @method $this setConfirmationUrl($confirmationUrl)
 * @method $this setName($name)
 * @method $this setReturnUrl($returnUrl)
 * @method $this setStatus($status)
 * @method $this setTerms($terms)
 */
class RecurringApplicationCharge extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Deletes,
        Activates,
        Customizes,
        Provides;

    /**
     * @var string
     */
    protected $resourceName = 'recurring_application_charge';

    /**
     * @var array
     */
    protected $provides = [
        'recurring_application_charge_id' => 'id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'capped_amount' => 'float',
        'price' => 'float',
        'trial_days' => 'int',
    ];

    /**
     * @return RecurringApplicationChargeCriteria
     */
    public function criteria()
    {
        return new RecurringApplicationChargeCriteria($this->client);
    }
}