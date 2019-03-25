<?php

namespace Yorki\Shopify\Events\Cart;

use Yorki\Shopify\Collection;
use Yorki\Shopify\Events\Base;
use Yorki\Shopify\Events\Schema\LineItem;

/**
 * @property string $id
 * @property string $token
 * @property Collection $line_items
 *
 * @method string getId()
 * @method string getToken()
 * @method Collection getLineItems()
 */
class CartCreateEvent extends Base
{
    const EVENT_TOPIC = 'carts/create';

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'string',
        'line_items' => 'collection:schema:' . LineItem::class,
    ];
}