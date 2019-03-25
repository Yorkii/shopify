<?php

namespace Yorki\Shopify\Properties\Orders;

use Yorki\Shopify\Properties\Base;

/**
 * @property string $accept_language
 * @property string $browser_ip
 * @property int $browser_height
 * @property int $browser_width
 * @property string $session_hash
 * @property string $user_agent
 * 
 * @method string getAcceptLanguage()
 * @method string getBrowserIp()
 * @method int getBrowserHeight()
 * @method int getBrowserWidth()
 * @method string getSessionHash()
 * @method string getUserAgent()
 * 
 * @method $this setAcceptLanguage($acceptLanguage)
 * @method $this setBrowserIp($browserIp)
 * @method $this setBrowserHeight($browserHeight)
 * @method $this setBrowserWidth($browserWidth)
 * @method $this setSessionHash($sessionHash)
 * @method $this setUserAgent($userAgent)
 */
class ClientDetails extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'browser_height' => 'int',
        'browser_width' => 'int',
    ];
}