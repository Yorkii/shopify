<?php

namespace Yorkii\Shopify\Resources\Billing;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Creates;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;

/**
 * @property int $id
 * @property float $amount
 * @property string $description
 * @property bool|null $test
 * 
 * @method int getId()
 * @method float getAmount()
 * @method string getDescription()
 * @method bool|null getTest()
 * 
 * @method $this setId($id)
 * @method $this setAmount($amount)
 * @method $this setDescription($description)
 * @method $this setTest($test)
 */
class ApplicationCredit extends Base
{
    use GetsAll,
        GetsSingle,
        Creates;

    /**
     * @var string
     */
    protected $resourceName = 'application_credit';

    /**
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
    ];
}