<?php

namespace Yorkii\Shopify\Events\Schema;

/**
 * @property string $first_name
 * @property string $address1
 * @property string $phone
 * @property string $city
 * @property string $zip
 * @property string $province
 * @property string $country
 * @property string $last_name
 * @property string $address2
 * @property string $company
 * @property string $name
 * @property string $country_code
 * @property string $province_code
 * @property float $latitude
 * @property float $longitude
 * 
 * @method string getFirstName()
 * @method string getAddress1()
 * @method string getPhone()
 * @method string getCity()
 * @method string getZip()
 * @method string getProvince()
 * @method string getCountry()
 * @method string getLastName()
 * @method string getAddress2()
 * @method string getCompany()
 * @method string getName()
 * @method string getCountryCode()
 * @method string getProvinceCode()
 * @method float getLatitude()
 * @method float getLongitude()
 */
class Address extends Base
{
    /**
     * @var array
     */
    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}