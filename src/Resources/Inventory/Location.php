<?php

namespace Yorkii\Shopify\Resources\Inventory;

use Yorkii\Shopify\Properties\Inventory\InventoryLevel;
use Yorkii\Shopify\Resources\Base;
use Yorkii\Shopify\Resources\Traits\Counts;
use Yorkii\Shopify\Resources\Traits\GetsAll;
use Yorkii\Shopify\Resources\Traits\GetsSingle;
use \Carbon\Carbon;

/**
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 *
 * @property int $id
 * @property bool $legacy
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $country
 * @property string $country_code
 * @property string $name
 * @property string $phone
 * @property string $province
 * @property string $province_code
 * @property string $zip
 * 
 * @method Carbon getCreatedAt()
 * @method Carbon getUpdatedAt()
 * @method int getId()
 * @method bool getLegacy()
 * @method string getAddress1()
 * @method string getAddress2()
 * @method string getCity()
 * @method string getCountry()
 * @method string getCountryCode()
 * @method string getName()
 * @method string getPhone()
 * @method string getProvince()
 * @method string getProvinceCode()
 * @method string getZip()
 * 
 * @method int setId($value)
 * @method bool setLegacy($value)
 * @method string setAddress1($value)
 * @method string setAddress2($value)
 * @method string setCity($value)
 * @method string setCountry($value)
 * @method string setCountryCode($value)
 * @method string setName($value)
 * @method string setPhone($value)
 * @method string setProvince($value)
 * @method string setProvinceCode($value)
 * @method string setZip($value)
 */
class Location extends Base
{
    use GetsAll,
        GetsSingle,
        Counts;

    /**
     * @var array
     */
    protected $casts = [
        'legacy' => 'bool',
    ];

    /**
     * @throws \Exception
     *
     * @return \Yorkii\Shopify\Collection
     */
    public function inventoryLevels()
    {
        $response = $this->client->performGetRequest(
            $this->getFilledSingleEndpoint(null, '/inventory_levels.json')
        );

        return $this->getCollectionFromResponse(
            $response,
            'inventory_levels',
            InventoryLevel::class,
            false
        );
    }
}