<?php

namespace  Yorki\Shopify\Resources\Plus;

use Yorki\Shopify\Criteria\Plus\GiftCardCriteria;
use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\Counts;
use Yorki\Shopify\Resources\Traits\CreatesAndSaves;
use Yorki\Shopify\Resources\Traits\Disables;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsSingle;
use Yorki\Shopify\Resources\Traits\Searches;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $expires_on
 * @property-read Carbon $disabled_at
 *
 * @property int $id
 * @property int $customer_id
 * @property int $line_item_id
 * @property int $order_id
 * @property int $user_id
 * @property float $balance
 * @property float $initial_value
 * @property string $code
 * @property string $currency
 * @property string $last_characters
 * @property string $note
 * @property string $template_suffix
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method Carbon getExpiresOn()
 * @method Carbon getDisabledAt()
 * @method int getId()
 * @method int getCustomerId()
 * @method int getLineItemId()
 * @method int getOrderId()
 * @method int getUserId()
 * @method float getBalance()
 * @method float getInitialValue()
 * @method string getCode()
 * @method string getCurrency()
 * @method string getLastCharacters()
 * @method string getNote()
 * @method string getTemplateSuffix()
 *
 * @method $this setId($value)
 * @method $this setCustomerId($value)
 * @method $this setLineItemId($value)
 * @method $this setOrderId($value)
 * @method $this setUserId($value)
 * @method $this setBalance($value)
 * @method $this setInitialValue($value)
 * @method $this setCode($value)
 * @method $this setCurrency($value)
 * @method $this setLastCharacters($value)
 * @method $this setNote($value)
 * @method $this setTemplateSuffix($value)
 */
class GiftCard extends Base
{
    use GetsAll,
        GetsSingle,
        CreatesAndSaves,
        Counts,
        Disables,
        Searches;

    /**
     * @var string
     */
    protected $resourceName = 'gift_card';

    /**
     * @var array
     */
    protected $casts = [
        'balance' => 'float',
        'initial_value' => 'float',
    ];

    /**
     * @return GiftCardCriteria
     */
    public function criteria()
    {
        return new GiftCardCriteria($this->client);
    }
}