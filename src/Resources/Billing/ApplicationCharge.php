<?php

namespace Yorkii\Shopify\Resources\Billing;

use Yorkii\Shopify\Criteria\Billing\ApplicationChargeCriteria;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Activates;
use Yorkii\Shopify\Resources\Traits\Creates;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property float $price
 * @property string $confirmation_url
 * @property string $name
 * @property string $return_url
 * @property string $status
 * @property bool|null $test
 *
 * @method int getId()
 * @method Carbon getCreatedAt() 
 * @method Carbon getUpdatedAt()
 * @method float getPrice()
 * @method bool|null getTest()
 * @method string getName()
 * @method string getReturnUrl()
 * @method string getConfirmationUrl()
 * @method string getStatus()
 * 
 * @method $this setId($id)
 * @method $this setPrice($price)
 * @method $this setTest($test)
 * @method $this setName($name)
 * @method $this setReturnUrl($returnUrl)
 * @method $this setConfirmationUrl($confirmationUrl)
 * @method $this setStatus($status)
 */
class ApplicationCharge extends Base
{
    use GetsAll,
        GetsSingle,
        Creates,
        Activates;

    /**
     * @var string
     */
    protected $resourceName = 'application_charge';

    /**
     * @var array
     */
    protected $casts = [
        'price' => 'float',
    ];

    /**
     * @return ApplicationChargeCriteria
     */
    public function criteria()
    {
        return new ApplicationChargeCriteria($this->client);
    }
}