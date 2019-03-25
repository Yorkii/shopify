<?php

namespace Yorkii\Shopify\Events\Cart;

use Yorkii\Shopify\Collection;
use Yorkii\Shopify\Events\Base;
use Yorkii\Shopify\Events\Schema\LineItem;

/**
 * @property string $id
 * @property string $token
 * @property Collection $line_items
 *
 * @method string getId()
 * @method string getToken()
 * @method Collection getLineItems()
 */
class CartUpdateEvent extends Base
{
    const EVENT_TOPIC = 'carts/update';

    /**
     * @var array
     */
    protected $casts = [
        'line_items' => 'collection:schema:' . LineItem::class,
    ];
}