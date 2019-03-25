<?php

namespace  Yorki\Shopify\Resources\Plus;

use Yorki\Shopify\Resources\Base;
use Yorki\Shopify\Resources\Traits\GetsAll;
use Yorki\Shopify\Resources\Traits\GetsCurrent;
use Yorki\Shopify\Resources\Traits\GetsSingle;

/**
 * @property bool $account_owner
 * @property string $bio
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property int $id
 * @property string $im
 * @property array $permissions
 * @property string $phone
 * @property bool $receive_announcements
 * @property string $screen_name
 * @property string $url
 * @property string $locale
 * @property string $user_type
 * 
 * @method bool getAccountOwner()
 * @method string getBio()
 * @method string getEmail()
 * @method string getFirstName()
 * @method string getLastName()
 * @method int getId()
 * @method string getIm()
 * @method array getPermissions()
 * @method string getPhone()
 * @method bool getReceiveAnnouncements()
 * @method string getScreenName()
 * @method string getUrl()
 * @method string getLocale()
 * @method string getUserType()
 *
 * @method $this setAccountOwner($value)
 * @method $this setBio($value)
 * @method $this setEmail($value)
 * @method $this setFirstName($value)
 * @method $this setLastName($value)
 * @method $this setId($value)
 * @method $this setIm($value)
 * @method $this setPermissions(array $value)
 * @method $this setPhone($value)
 * @method $this setReceiveAnnouncements($value)
 * @method $this setScreenName($value)
 * @method $this setUrl($value)
 * @method $this setLocale($value)
 * @method $this setUserType($value)
 */
class User extends Base
{
    use GetsAll,
        GetsSingle,
        GetsCurrent;

    /**
     * @var string
     */
    protected $resourceName = 'user';

    /**
     * @var array
     */
    protected $casts = [
        'account_owner' => 'bool',
        'permissions' => 'array',
        'receive_announcements' => 'bool',
    ];
}