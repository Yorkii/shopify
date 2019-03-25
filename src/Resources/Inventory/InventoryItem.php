<?php

namespace Yorkii\Shopify\Resources\Inventory;

use Yorkii\Shopify\Criteria\Inventory\InventoryItemCriteria;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use Yorkii\Shopify\Resources\Traits\Updates;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * 
 * @property int $id
 * @property bool $tracked
 * @property string $sku
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt() 
 * @method int getId()
 * @method bool getTracked()
 * @method string getSku()
 *
 * @method $this setId($value)
 * @method $this setTracked($value)
 * @method $this setSku($value)
 * 
 */
class InventoryItem extends Base
{
    use GetsAll,
        GetsSingle,
        Updates;

    /**
     * @var array
     */
    protected $casts = [
        'tracked' => 'bool',
    ];

    /**
     * @return InventoryItemCriteria
     */
    public function criteria()
    {
        return new InventoryItemCriteria($this->client);
    }
}