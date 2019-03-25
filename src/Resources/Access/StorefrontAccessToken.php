<?php

namespace Yorkii\Shopify\Resources\Access;

use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Creates;
use Yorkii\Shopify\Resources\Traits\Deletes;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * 
 * @property int $id
 * @property string $access_token
 * @property string $title
 * @property array $access_scope
 *
 * @method Carbon getCreatedAt() 
 * @method int getId()
 * @method string getAccessToken()
 * @method string getTitle()
 * @method array getAccessScope()
 *
 * @method $this setId($id)
 * @method $this setAccessToken($accessToken)
 * @method $this setTitle($title)
 * @method $this setAccessScope($accessScope)
 */
class StorefrontAccessToken extends Base
{
    use GetsAll,
        Creates,
        Deletes;

    /**
     * @var string
     */
    protected $resourceName = 'access_scope';

    /**
     * @param string $value
     *
     * @return array
     */
    public function getAccessScopeAttribute($value)
    {
        return $this->fromCommaSeparated($value);
    }

    /**
     * @param array $value
     *
     * @return string
     */
    public function setAccessScopeAttribute(array $value)
    {
        return $this->toCommaSeparated($value);
    }
}