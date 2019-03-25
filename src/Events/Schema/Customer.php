<?php

namespace Yorkii\Shopify\Events\Schema;

use \Carbon\Carbon;

/**
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $id
 * @property string $email
 * @property bool $accepts_marketing
 * @property string $first_name
 * @property string $last_name
 * @property int $orders_count
 * @property string $state
 * @property float $total_spent
 * @property int $last_order_id
 * @property string $note
 * @property bool $verified_email
 * @property string $multipass_identifier
 * @property bool $tax_exempt
 * @property string $phone
 * @property string $tags
 * @property string $last_order_name
 * @property array $addresses
 *
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method string getEmail()
 * @method bool getAcceptsMarketing()
 * @method string getFirstName()
 * @method string getLastName()
 * @method int getOrdersCount()
 * @method string getState()
 * @method float getTotalSpent()
 * @method int getLastOrderId()
 * @method string getNote()
 * @method bool getVerifiedEmail()
 * @method string getMultipassIdentifier()
 * @method bool getTaxExempt()
 * @method string getPhone()
 * @method string getTags()
 * @method string getLastOrderName()
 * @method array getAddresses()
 */
class Customer extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'accepts_marketing' => 'bool',
        'orders_count' => 'int',
        'total_spent' => 'float',
        'verified_email' => 'bool',
        'tax_exempt' => 'bool',
    ];
}