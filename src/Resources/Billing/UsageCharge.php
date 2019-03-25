<?php

namespace Yorki\Shopify\Resources\Billing;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Creates;
use Yorki\Shopify\Resources\Traits\Depends;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property int $recurring_application_charge_id
 * @property float $price
 * @property string description
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method int getRecurringApplicationChargeId()
 * @method float getPrice()
 * @method string getDescription()
 *  
 * @method $this setId($id)
 * @method $this setRecurringApplicationChargeId($recurringApplicationChargeId)
 * @method $this setPrice($price)
 * @method $this setDescription($description)
 */
class UsageCharge extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Depends;

    /**
     * @var string
     */
    protected $resourceName = 'usage_charge';

    /**
     * @var string
     */
    protected $endpoint = 'admin/:recurring_application_charge_id/usage_charges';

    /**
     * @var array
     */
    protected $depends = [
        'recurring_application_charge_id',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'price' => 'float',
    ];
}