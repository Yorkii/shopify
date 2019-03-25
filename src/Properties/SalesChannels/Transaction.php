<?php

namespace Yorki\Shopify\Properties\SalesChannels;

use Yorki\Shopify\Properties\Base;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 *
 * @property int $id
 * @property float $amount
 * @property float $amount_in
 * @property float $amount_out
 * @property float $amount_rounding
 * @property string $authorization
 * @property string $currency
 * @property string $error_code
 * @property string $gateway
 * @property string $kind
 * @property string $message
 * @property string $status
 * 
 * @method Carbon getCreatedAt()
 * @method int getId()
 * @method float getAmount()
 * @method float getAmountIn()
 * @method float getAmountOut()
 * @method float getAmountRounding()
 * @method string getAuthorization()
 * @method string getCurrency()
 * @method string getErrorCode()
 * @method string getGateway()
 * @method string getKind()
 * @method string getMessage()
 * @method string getStatus()
 * 
 * @method $this setId($value)
 * @method $this setAmount($value)
 * @method $this setAmountIn($value)
 * @method $this setAmountOut($value)
 * @method $this setAmountRounding($value)
 * @method $this setAuthorization($value)
 * @method $this setCurrency($value)
 * @method $this setErrorCode($value)
 * @method $this setGateway($value)
 * @method $this setKind($value)
 * @method $this setMessage($value)
 * @method $this setStatus($value)
 */
class Transaction extends Base
{
    /**
     * @var array 
     */
    protected $casts = [
        'amount' => 'float',
        'amount_in' => 'float',
        'amount_out' => 'float',
        'amount_rounding' => 'float',
        'test' => 'bool',
    ];
}